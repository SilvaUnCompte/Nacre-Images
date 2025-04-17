<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/services.php');

$result = Services::getAll();

echo json_encode($result);