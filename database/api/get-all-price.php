<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');

$result = Prices::getAll();

echo json_encode($result);