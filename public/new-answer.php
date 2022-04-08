<?php
require_once '../app/Manager/QuestionManager.php';
//require_once '../app/Manager/AnswerManager.php';
$question = new QuestionManager();
$questions = $question->getAll();

// $answerManager = new AnswerManager();
// $answers = $answerManager->getAll();

$message = "";

if(isset($_POST['submit']))
{
    if(!empty($_POST['text']))
    {
        require_once '../app/Manager/AnswerManager.php';
        $manager = new AnswerManager();
        $answerId = $manager->insert($_GET['id'], $_POST['text'], $_POST['is_the_good'], $_GET['id_question']);

        if($answerId)
        {
            header('Location: /index-question.php'); die;
        }
        else
        {
            $message = "Une erreur s'est produite lors de l'enregistrement";
        }
    }
    else
    {
        $message = "Une reponse est obligatoire";
    }
}


require '../template/new-answer.tpl.php';