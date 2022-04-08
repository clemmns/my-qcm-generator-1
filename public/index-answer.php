<?php

require '../app/Manager/AnswerManager.php';
require '../app/Manager/QuestionManager.php';



$manager = new AnswerManager();
$answers = $manager->getAll();

$question = new QuestionManager();
$questions = $question->getAll();


require '../template/index-answer.tpl.php';