<?php
header('Content-Type: application/json');

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');

// Get the current date
$current_date = date('Y-m-d');

// Prepare SQL query to fetch the next closest session date
$query = $db->prepare('SELECT * FROM workshop_session WHERE date > :current_date ORDER BY date ASC LIMIT 1');
$query->execute(['current_date' => $current_date]);

// Fetch the result
$result = $query->fetch();

if ($result) {
    echo json_encode($result);
} else {
    echo json_encode(['message' => 'No upcoming sessions found']);
}
?>