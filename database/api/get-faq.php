<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/faq.php');

$result = FAQ::getAll();

echo json_encode($result);