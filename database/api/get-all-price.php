<?php

require_once(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/prices.php');

$result = Prices::getAll();

echo json_encode($result);