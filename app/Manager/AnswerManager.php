<?php

require '../app/Entity/Answer.php';

class AnswerManager
{
    private $pdo;

    public function __construct()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=my_qcm_generator','root');
        }
        catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            die;
        }
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM answer';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $answers = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($answers as $answer)
        {
            $obj = new Answer();
            $obj->setId($answer['id']);
            $obj->setText($answer['text']);
            $obj->setIsTheGoodAnswer($answer['is_the_good']);
            $obj->setId_question($answer['id_question']);
            $result[] = $obj;
        }

        return $result;
    }

    /**
     * Recupère les infos d'une question via son id
     * @param int $id
     * 
     * @return Answer
     */
    public function get(int $id) : Answer
    {
        $sql = "SELECT * FROM answer WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        $answer = (new Answer())
            ->setId($result['id'])
            ->setText($result['text'])
            ->setIsTheGood($result['is_the_good'])
            ->setIdanswer($result['id_question']);

        return $answer;
    }

    public function insert(int $id, string $text, bool $is_the_good, int $id_question)
    {
        $sql = "INSERT INTO answer (id, `text`, is_the_good, id_question) VALUES (:id, :text, :is_the_good, :id_question)";
        $req = $this->pdo->prepare($sql);
        $req->execute(compact(
            'id',
            'text',
            'is_the_good',
            'id_question')
        );

        return $this->pdo->lastInsertId();
    }

    public function update(int $id, string $title, bool $isTheGoodAnswer, int $id_answer)
    {
        $sql = "UPDATE answer SET `text` = :`text`, isTheGoodAnswer = :is_the_good, id_question = :id_question WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        return $req->execute([
            'id' => $id,
            'text' => $text,
            'is_the_good' => $isTheGoodAnswer,
            'id_question' => $id_question]);
    }

    public function deleteAnswer(int $id) :void
    {
        $sql = "DELETE FROM answer WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->execute(['id' => $id]);
    }

}