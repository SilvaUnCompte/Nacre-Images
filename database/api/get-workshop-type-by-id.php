<?php
header('Content-Type: application/json');

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

if (!isset($_GET['id'])) {
    exit;
}

$query = $db->prepare('SELECT * FROM workshop_type WHERE id = :id');
$query->execute(['id' => $_GET['id']]);
$result = $query->fetch();

echo json_encode($result);