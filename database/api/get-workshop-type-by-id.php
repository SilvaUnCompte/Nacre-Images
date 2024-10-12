<?php
header('Content-Type: application/json');

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = -1;
}

$query = $db->prepare('SELECT * FROM workshop_type' . ($id === -1 ? '' : ' WHERE id = :id'));
if ($id !== -1)
    $query->execute(['id' => $id]);
else
    $query->execute();

$result = $query->fetchAll();

echo json_encode($result);
