<?php

require_once(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/services.php');

$result = Services::getAll();

echo json_encode($result);