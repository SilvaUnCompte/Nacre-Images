<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

class Prices
{
    private $id;
    private $price;
    private $label;
    private $description;
    private $type; // 0: groupe 1: individuel 2: special

    public function __construct($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM prices WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        if (!$result) {
            echo header("HTTP/1.1 401");
            exit;
        }

        $this->id = $result['id'];
        $this->price = $result['price'];
        $this->label = $result['label'];
        $this->description = $result['description'];
        $this->type = $result['type'];
    }
    public function __destruct()
    {
        exit;
    }

    public function update()
    {
        global $db;

        $query = $db->prepare('UPDATE prices SET price = :price, label = :label, description = :description, type = :type WHERE id = :id');

        $query->execute([
            'id' => $this->id,
            'type' => $this->price,
            'date' => $this->label,
            'description' => $this->description,
            'type' => $this->type
        ]);
    }

    public function delete()
    {
        global $db;

        $query = $db->prepare('DELETE FROM prices WHERE id = :id');
        $query->execute(['id' => $this->id]);
    }

    public static function getAll()
    {
        global $db;

        $query = $db->query('SELECT * FROM prices');
        $result = $query->fetchAll();

        return $result;
    }

    public static function delete_by_id($id_to_delete)
    {
        global $db;

        $query = $db->prepare('DELETE FROM prices WHERE id = :id');
        $query->execute(['id' => $id_to_delete]);
    }

    public static function create($price, $label, $description, $type)
    {
        global $db;

        $query = $db->prepare('INSERT INTO prices (price, label, description, type) VALUES (:price, :label, :description, :type)');
        $query->execute([
            'price' => $price,
            'label' => $label,
            'description' => $description,
            'type' => $type
        ]);
    }
}
