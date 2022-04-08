<?php

require '../app/Manager/QcmManager.php';


$manager = new QcmManager();
$qcms = $manager->getAll();
// $query = new QcmManager();
// $titre = $query->getTitle();

require '../template/index-qcm.tpl.php';