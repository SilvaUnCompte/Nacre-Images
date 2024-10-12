<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

class FAQ
{
    private $id;
    private $question;
    private $answer;

    public function __construct($id)
    {
        global $db;

        $query = $db->prepare('SELECT * FROM faq WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        if (!$result) {
            echo header("HTTP/1.1 401");
            exit;
        }

        $this->id = $result['id'];
        $this->question = $result['question'];
        $this->answer = $result['answer'];
    }
    public function __destruct()
    {
        exit;
    }

    public function update()
    {
        global $db;

        $query = $db->prepare('UPDATE faq SET question = :question, answer = :answer WHERE id = :id');

        $query->execute([
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer
        ]);
    }

    public function delete()
    {
        global $db;

        $query = $db->prepare('DELETE FROM faq WHERE id = :id');
        $query->execute(['id' => $this->id]);
    }

    public static function delete_by_id($id_to_delete)
    {
        global $db;

        $query = $db->prepare('DELETE FROM faq WHERE id = :id');
        $query->execute(['id' => $id_to_delete]);
    }

    public static function create($question, $answer)
    {
        global $db;

        $query = $db->prepare('INSERT INTO faq (question, answer) VALUES (:question, :answer)');
        $query->execute([
            'question' => $question,
            'answer' => $answer
        ]);
    }

    public static function getAll()
    {
        global $db;

        $query = $db->prepare('SELECT * FROM faq');
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getQuestion()
    {
        return $this->question;
    }
    public function getAnswer()
    {
        return $this->answer;
    }
    public function setQuestion($question)
    {
        $this->question = $question;
    }
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
}
