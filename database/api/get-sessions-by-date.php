<?php
header('Content-Type: application/json');

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

if (!isset($_GET["start_date"]) || !isset($_GET["end_date"])) {
    exit;
}

$start_date = $_GET["start_date"];
$end_date = $_GET["end_date"];

$query = $db->prepare("SELECT * FROM workshop_session WHERE date BETWEEN :start_date AND :end_date ORDER BY date ASC");
$query->execute([
    'start_date' => $start_date,
    'end_date' => $end_date
]);

$sessions = $query->fetchAll(PDO::FETCH_ASSOC);

if ($sessions) {
    echo json_encode($sessions);
} else {
    echo json_encode(['message' => 'No upcoming sessions found']);
}
?>