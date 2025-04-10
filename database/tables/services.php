<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

class services
{
    private $id;
    private $label;
    private $desc;
    private $price;
    private $link;
    private $url;
    private $page_part;

    public function __construct($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM services WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        if (!$result) {
            echo header("HTTP/1.1 404");
            exit;
        }

        $this->id = $result['id'];
        $this->label = $result['label'];
        $this->desc = $result['desc'];
        $this->price = $result['price'];
        $this->link = $result['link'];
        $this->url = $result['url'];
        $this->page_part = $result['page_part'];
    }
    public function __destruct()
    {
        exit;
    }

    public static function getAll()
    {
        global $db;

        $query = $db->query('SELECT * FROM services');
        $result = $query->fetchAll();

        return $result;
    }

    public static function getById($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM services WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        return $result;
    }

    public function updateById($id, $label, $desc, $price, $link, $url, $page_part)
    {
        global $db;
        
        $query = $db->prepare('UPDATE services SET label = :label, desc = :desc, price = :price, link = :link, url = :url, page_part = :page_part WHERE id = :id');
        $query->execute([
            'id' => $id,
            'label' => $label,
            'desc' => $desc,
            'price' => $price,
            'link' => $link,
            'url' => $url,
            'page_part' => $page_part
        ]);
    }
    
    public function delete()
    {
        global $db;

        $query = $db->prepare('DELETE FROM services WHERE id = :id');
        $query->execute(['id' => $this->id]);
    }
    public function deleteById($id)
    {
        global $db;

        $query = $db->prepare('DELETE FROM services WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    public static function create($label, $desc, $price, $link, $url, $page_part)
    {
        global $db;
        
        $query = $db->prepare('INSERT INTO services (label, desc, price, link, url, page_part) VALUES (:label, :desc, :price, :link, :url, :page_part)');
        $query->execute([
            'label' => $label,
            'desc' => $desc,
            'price' => $price,
            'link' => $link,
            'url' => $url,
            'page_part' => $page_part
        ]);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getLabel()
    {
        return $this->label;
    }
    public function getDesc()
    {
        return $this->desc;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function setLabel($label)
    {
        $this->label = $label;
    }
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
