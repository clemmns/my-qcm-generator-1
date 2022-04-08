<?php

require '../app/Manager/QuestionManager.php';
//require '../app/Manager/QcmManager.php';

$manager = new QuestionManager();
$questions = $manager->getAll();
// $query = new QcmManager();
// $titre = $query->getTitle();

require '../template/index-question.tpl.php';