<?php

if(isset($_GET['id']))
{

    $message = "";

    // Récupère les données de la question dont l'id est == à $_GET['id']
    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $question = $questionManager->get($_GET['id']);

    // On recupère tous les qcms depuis la db
    // require '../app/Manager/QcmManager.php';
    // $qcmManager = new QcmManager();
    // $qcms = $qcmManager->getAll();


    if(isset($_GET['id']))
    {
        try
        {
            $formErrors = [];
            if(empty($_GET['id']))
                $formErrors[] = "L'id est obligatoire dans l'url'";

            if(count($formErrors) > 0)
                throw new Exception(implode("<br />", $formErrors));

            $questionManager->deleteQuestion($_GET['id']);
            header('Location: /index-question.php');
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }
        
    }
}