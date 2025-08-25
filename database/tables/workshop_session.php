<?php

require_once(ROOT_DIR . '/database/connexion.php');

class WorkshopSession
{
    private $id;
    private $type;
    private $date;
    private $additional_information;

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
        $this->additional_information = $result['additional_information'];
    }
    public function __destruct()
    {
        exit;
    }

    public function update()
    {
        global $db;

        $query = $db->prepare('UPDATE workshop_session SET type = :type, date = :date, additional_information = :additional_information WHERE id = :id');

        $query->execute([
            'id' => $this->id,
            'type' => $this->type,
            'date' => $this->date,
            'additional_information' => $this->additional_information
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

    public static function create($type, $date, $additional_information)
    {
        global $db;

        $query = $db->prepare('INSERT INTO workshop_session (type, date, additional_information) VALUES (:type, :date, :additional_information)');
        $query->execute([
            'type' => $type,
            'date' => $date,
            'additional_information' => $additional_information
        ]);
    }

    public static function getOneYearFutureSession()
    {
        global $db;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+364 days'));

        $query = $db->prepare("SELECT * from workshop_session ws 
        left join workshop_type wt on ws.`type` = wt.id
        WHERE date BETWEEN :start_date AND :end_date ORDER BY date ASC");
        $query->execute([
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        $sessions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $sessions;
    }

    public static function getFutureSessionByDate($date, $end_date = null)
    {
        global $db;
        if ($end_date == null) {
            $end_date = date('9999-12-31');
        }

        $query = $db->prepare("SELECT ws.id, type, date, additional_information, topic_name, url from workshop_session ws 
        left join workshop_type wt on ws.`type` = wt.id WHERE date BETWEEN :start_date AND :end_date ORDER BY date ASC");
        $query->execute([
            'start_date' => $date,
            'end_date' => $end_date
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
        return $this->additional_information;
    }
    public function setAdditionnalInformation($additional_information)
    {
        $this->additional_information = $additional_information;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
}
