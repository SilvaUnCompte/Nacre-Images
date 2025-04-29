<?php

require_once(ROOT_DIR . '/database/connexion.php');

class FAQ
{
    private $id;
    private $question;
    private $answer;
    private $rank;

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
        $this->rank = $result['rank'];
    }
    public function __destruct()
    {
        exit;
    }

    public function update()
    {
        $old_question = new FAQ($this->id);
        FAQ::updateRangeRank($old_question->getrank(), $this->rank);

        global $db;

        $query = $db->prepare('UPDATE faq SET question = :question, answer = :answer, `rank` = :rank WHERE id = :id');
        $query->execute([
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
            'rank' => $this->rank
        ]);
    }

    public static function updateGreaterRank($rank, $count) // count = -1 or +1
    {
        global $db;

        $query = $db->prepare('UPDATE faq SET `rank` = `rank` + :count WHERE `rank` >= :rank');
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
        $query = $db->prepare('UPDATE faq SET `rank` = `rank` + :count WHERE `rank` >= :smallerRank AND `rank` <= :biggerRank');
        $query->execute([
            'smallerRank' => min($oldRank, $newRank),
            'biggerRank' => max($oldRank, $newRank),
            'count' => $count
        ]);
    }

    public function delete()
    {
        global $db;

        FAQ::updateGreaterRank($this->rank, -1);

        $query = $db->prepare('DELETE FROM faq WHERE id = :id');
        $query->execute(['id' => $this->id]);
    }

    public static function delete_by_id($id_to_delete)
    {
        $question = new FAQ($id_to_delete);
        $question->delete();
    }

    public static function create($question, $answer, $rank)
    {
        global $db;

        FAQ::updateGreaterRank($rank, 1);

        $query = $db->prepare('INSERT INTO faq (question, answer, `rank`) VALUES (:question, :answer, :rank)');
        $query->execute([
            'question' => $question,
            'answer' => $answer,
            'rank' => $rank
        ]);
    }

    public static function getAll()
    {
        global $db;

        $query = $db->prepare('SELECT * FROM faq ORDER BY `rank` ASC');
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
    public function setrank($rank)
    {
        $this->rank = $rank;
    }
    public function getrank()
    {
        return $this->rank;
    }
}
