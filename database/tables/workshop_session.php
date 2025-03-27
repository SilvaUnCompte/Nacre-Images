<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

class WorkshopSession
{
    private $id;
    private $type;
    private $date;
    private $additionnal_information;

    public function __construct($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM workshop_session WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        if (!$result) {
            echo header("HTTP/1.1 401");
            exit;
        }

        $this->id = $result['id'];
        $this->type = $result['type'];
        $this->date = $result['date'];
        $this->additionnal_information = $result['additionnal_information'];
    }
    public function __destruct()
    {
        exit;
    }

    public function update()
    {
        global $db;

        $query = $db->prepare('UPDATE workshop_session SET type = :type, date = :date, additionnal_information = :additionnal_information WHERE id = :id');

        $query->execute([
            'id' => $this->id,
            'type' => $this->type,
            'date' => $this->date,
            'additionnal_information' => $this->additionnal_information
        ]);
    }

    public function delete()
    {
        global $db;

        $query = $db->prepare('DELETE FROM workshop_session WHERE id = :id');
        $query->execute(['id' => $this->id]);
    }

    public static function delete_by_id($id_to_delete)
    {
        global $db;

        $query = $db->prepare('DELETE FROM workshop_session WHERE id = :id');
        $query->execute(['id' => $id_to_delete]);
    }

    public static function create($type, $date, $additionnal_information)
    {
        global $db;

        $query = $db->prepare('INSERT INTO workshop_session (type, date, additionnal_information) VALUES (:type, :date, :additionnal_information)');
        $query->execute([
            'type' => $type,
            'date' => $date,
            'additionnal_information' => $additionnal_information
        ]);
    }

    public static function getFutureSession()
    {
        global $db;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+364 days'));

        $query = $db->prepare("SELECT * FROM workshop_session WHERE date BETWEEN :start_date AND :end_date ORDER BY date ASC");
        $query->execute([
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        $sessions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $sessions;
    }

    public static function getFutureSessionByDate($date)
    {
        global $db;
        $start_date = date('Y-m-d');

        $query = $db->prepare("SELECT * FROM workshop_session WHERE date >= :start_date ORDER BY date ASC");
        $query->execute([
            'start_date' => $start_date,
        ]);

        $sessions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $sessions;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getAdditionnalInformation()
    {
        return $this->additionnal_information;
    }
}
