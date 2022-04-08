<?php

require '../app/Entity/Question.php';

class QuestionManager
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
        $sql = 'SELECT * FROM question';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $qs = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($qs as $q)
        {
            $obj = new Question();
            $obj->setId($q['id']);
            $obj->setTitle($q['title']);
            $result[] = $obj;
        }

        return $result;
    }

    /**
     * Recupère les infos d'une question via son id
     * @param int $id
     * 
     * @return Question
     */
    public function get(int $id) : Question
    {
        $sql = "SELECT * FROM question WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        $question = (new Question())
            ->setId($result['id'])
            ->setTitle($result['title'])
            ->setIdQcm($result['id_qcm']);

        return $question;
    }

    public function insert(string $title, int $id_qcm) : int
    {
        $sql = "INSERT INTO question (title, id_qcm) VALUES (:title, :id_qcm)";
        $req = $this->pdo->prepare($sql);
        $req->execute([
            'title' => $title,
            'id_qcm' => $id_qcm
        ]);

        return $this->pdo->lastInsertId();
    }

    public function update(int $id, string $title, int $id_qcm)
    {
        $sql = "UPDATE question SET title = :title, id_qcm = :id_qcm WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        return $req->execute(compact('id','title','id_qcm'));
    }

    public function deleteQuestion(int $id) :void
    {
        $sql = "DELETE FROM question WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->execute(['id' => $id]);
    }

    // public function getQcmTitle(int $id, string $title, int $id_qcm)
    // {
    //     $sql = "SELECT qcm.title = :title_qcm FROM qcm INNER JOIN question ON qcm.id = question.id_qcm";
    //     $req = $this->pdo->prepare($sql);
    //     $req->execute(['qcm.title' => $title_qcm]);
    //     return $title_qcm;
    // }

}