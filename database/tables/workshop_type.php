<?php

require_once(ROOT_DIR . '/database/connexion.php');

class WorkshopType
{
    private $id;
    private $topic_name;
    private $page_name;
    private $seo_desc;
    private $img_name;
    private $img_calendar;
    private $img_alt;
    private $big_title;
    private $small_title;
    private $paragraph;
    private $url;
    private $regularity_type;
    private $rank;

    public function __construct($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM workshop_type WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();
        
        if (!$result) {
            echo header("HTTP/1.1 404");
            exit;
        }
        
        $this->id = $result['id'];
        $this->topic_name = $result['topic_name'];
        $this->page_name = $result['page_name'];
        $this->seo_desc = $result['seo_desc'];
        $this->img_name = $result['img_name'];
        $this->img_calendar = $result['img_calendar'];
        $this->img_alt = $result['img_alt'];
        $this->big_title = $result['big_title'];
        $this->small_title = $result['small_title'];
        $this->paragraph = $result['paragraph'];
        $this->url = $result['url'];
        $this->regularity_type = $result['regularity_type'];
        $this->rank = $result['rank'];
    }
    public function __destruct()
    {
        exit;
    }

    public static function getAll()
    {
        global $db;

        $query = $db->query('SELECT * FROM workshop_type ORDER BY `rank` ASC');
        $result = $query->fetchAll();

        return $result;
    }

    static public function getNextSession($type)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM workshop_session WHERE type = :type AND date > NOW() ORDER BY date ASC LIMIT 10');
        $query->execute(['type' => $type]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function update($prevRank)
    {
        global $db;
        WorkshopType::updateRangeRank($prevRank, $this->rank);

        $query = $db->prepare('UPDATE workshop_type SET topic_name = :topic_name, page_name = :page_name, seo_desc = :seo_desc, img_name = :img_name, img_calendar = :img_calendar, img_alt = :img_alt, big_title = :big_title, small_title = :small_title, paragraph = :paragraph, `url` = :url, regularity_type = :regularity_type, `rank` = :rank WHERE id = :id');

        $query->execute([
            'id' => $this->id,
            'topic_name' => $this->topic_name,
            'page_name' => $this->page_name,
            'seo_desc' => $this->seo_desc,
            'img_name' => $this->img_name,
            'img_calendar' => $this->img_calendar,
            'img_alt' => $this->img_alt,
            'big_title' => $this->big_title,
            'small_title' => $this->small_title,
            'paragraph' => $this->paragraph,
            'url' => $this->url,
            'regularity_type' => $this->regularity_type,
            'rank' => $this->rank
        ]);
    }

    public function delete()
    {
        global $db;
        WorkshopType::updateGreaterRank($this->rank, -1);

        $query = $db->prepare('DELETE FROM workshop_type WHERE id = :id');
        $query->execute(['id' => $this->id]);
    }

    public static function delete_by_id($id_to_delete)
    {
        $workshop = new WorkshopType($id_to_delete);
        $workshop->delete();
    }

    public static function create($topic_name, $page_name, $seo_desc, $img_name, $img_calendar, $img_alt, $big_title, $small_title, $paragraph, $url, $regularity_type, $rank)
    {
        global $db;

        WorkshopType::updateGreaterRank($rank, 1);

        $query = $db->prepare('INSERT INTO workshop_type (topic_name, page_name, seo_desc, img_name, img_calendar, img_alt, big_title, small_title, paragraph, `url`, regularity_type, `rank`) VALUES (:topic_name, :page_name, :seo_desc, :img_name, :img_calendar, :img_alt, :big_title, :small_title, :paragraph, :url, :regularity_type, :rank)');
        $query->execute([
            'topic_name' => $topic_name,
            'page_name' => $page_name,
            'seo_desc' => $seo_desc,
            'img_name' => $img_name,
            'img_calendar' => $img_calendar,
            'img_alt' => $img_alt,
            'big_title' => $big_title,
            'small_title' => $small_title,
            'paragraph' => $paragraph,
            'url' => $url,
            'regularity_type' => $regularity_type,
            'rank' => $rank
        ]);
    }

    // Static methods for rank management

    public static function updateGreaterRank($rank, $count) // count = -1 or +1
    {
        global $db;

        $query = $db->prepare('UPDATE workshop_type SET `rank` = `rank` + :count WHERE `rank` >= :rank');
        $query->execute([
            'rank' => $rank,
            'count' => $count
        ]);
    }

    public static function updateRangeRank($oldRank, $newRank)
    {
        if ($oldRank == $newRank) {
            return;
        }
        $count = $oldRank < $newRank ? -1 : 1;

        global $db;
        $query = $db->prepare('UPDATE workshop_type SET `rank` = `rank` + :count WHERE `rank` >= :smallerRank AND `rank` <= :biggerRank');
        $query->execute([
            'smallerRank' => min($oldRank, $newRank),
            'biggerRank' => max($oldRank, $newRank),
            'count' => $count
        ]);
    }

    // Getters and Setters

    public function getId()
    {
        return $this->id;
    }
    public function getTopicName()
    {
        return $this->topic_name;
    }
    public function getPageName()
    {
        return $this->page_name;
    }
    public function getSeoDesc()
    {
        return $this->seo_desc;
    }
    public function getImgName()
    {
        return $this->img_name;
    }
    public function getImgCalendar()
    {
        return $this->img_calendar;
    }
    public function getImgAlt()
    {
        return $this->img_alt;
    }
    public function getBigTitle()
    {
        return $this->big_title;
    }
    public function getSmallTitle()
    {
        return $this->small_title;
    }
    public function getParagraph()
    {
        return $this->paragraph;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getRegularityType()
    {
        return $this->regularity_type;
    }
    public function getRank()
    {
        return $this->rank;
    }
    public function setTopicName($topic_name)
    {
        $this->topic_name = $topic_name;
    }
    public function setPageName($page_name)
    {
        $this->page_name = $page_name;
    }
    public function setSeoDesc($seo_desc)
    {
        $this->seo_desc = $seo_desc;
    }
    public function setImgName($img_name)
    {
        $this->img_name = $img_name;
    }
    public function setImgCalendar($img_calendar)
    {
        $this->img_calendar = $img_calendar;
    }
    public function setImgAlt($img_alt)
    {
        $this->img_alt = $img_alt;
    }
    public function setBigTitle($big_title)
    {
        $this->big_title = $big_title;
    }
    public function setSmallTitle($small_title)
    {
        $this->small_title = $small_title;
    }
    public function setParagraph($paragraph)
    {
        $this->paragraph = $paragraph;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function setRegularityType($regularity_type)
    {
        $this->regularity_type = $regularity_type;
    }
    public function setRank($rank)
    {
        $this->rank = $rank;
    }
}
