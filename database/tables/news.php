<?php

require_once(ROOT_DIR . '/database/connexion.php');

class News
{
    private $id;
    private $title;
    private $info;
    private $startDate;
    private $endDate;
    private $visible;
    private $img;

    public function __construct($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM news WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        if (!$result) {
            echo header("HTTP/1.1 404 Not Found");
            exit;
        }

        $this->id = $result['id'];
        $this->title = $result['title'];
        $this->info = $result['info'];
        $this->startDate = $result['start_date'];
        $this->endDate = $result['end_date'];
        $this->visible = $result['visible'];
        $this->img = $result['img'];
    }
    public function __destruct()
    {
        exit;
    }

    public static function create($title, $info, $startDate, $endDate, $visible, $img)
    {
        global $db;

        $query = $db->prepare('INSERT INTO news (title, info, start_date, end_date, visible, img) VALUES (:title, :info, :start_date, :end_date, :visible, :img)');
        $query->execute([
            'title' => $title,
            'info' => $info,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'visible' => $visible,
            'img' => $img
        ]);
    }

    public function update()
    {
        global $db;

        $query = $db->prepare('UPDATE news SET title = :title, info = :info, start_date = :start_date, end_date = :end_date, visible = :visible, img = :img WHERE id = :id');
        $query->execute([
            'id' => $this->id,
            'title' => $this->title,
            'info' => $this->info,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'visible' => $this->visible,
            'img' => $this->img
        ]);
    }

    public static function getAllNews()
    {
        global $db;

        $query = $db->prepare('SELECT * FROM news');
        $query->execute();
        $results = $query->fetchAll();

        if (!$results) {
            return [];
        }

        return $results;
    }

    public static function getVisibleNews()
    {
        global $db;

        $query = $db->prepare('SELECT * FROM news WHERE visible = 1 AND `start_date` <= NOW() AND `end_date` >= NOW() ORDER BY `start_date` DESC');
        $query->execute();
        $results = $query->fetchAll();

        if (!$results) {
            return [];
        }

        return $results;
    }

    public static function delete_by_id($id_to_delete)
    {
        global $db;

        $query = $db->prepare('DELETE FROM news WHERE id = :id');
        $query->execute(['id' => $id_to_delete]);
    }

    // Getters and Setters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getInfo()
    {
        return $this->info;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }
    public function getEndDate()
    {
        return $this->endDate;
    }
    public function getVisible()
    {
        return $this->visible;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setInfo($info)
    {
        $this->info = $info;
    }
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
}
