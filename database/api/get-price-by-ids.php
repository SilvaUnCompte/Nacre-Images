<?php

if (!isset($_GET['ids'])) {
    echo json_encode(['error' => 'Missing id argument']);
    exit;
}

require_once(ROOT_DIR . '/database/connexion.php');


$ids = array_map('intval', explode(',', $_GET['ids']));

$query = $db->prepare('SELECT * FROM prices WHERE id IN (' . implode(',', $ids) . ')');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);