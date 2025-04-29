<?php

require_once(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/faq.php');

$result = FAQ::getAll();

echo json_encode($result);