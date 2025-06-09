<?php

require_once(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/news.php');

$result = News::getAllNews();

echo json_encode($result);