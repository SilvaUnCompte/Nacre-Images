<?php
header('Content-Type: application/json');

require(ROOT_DIR . '/database/connexion.php');

// Get the current date
$current_date = date('Y-m-d');

// Prepare SQL query to fetch the next closest session date
$query = $db->prepare('select result.`date`,result.additional_information,wt.topic_name from workshop_type wt right join (
SELECT * FROM workshop_session ws where ws.`date` >= :current_date ORDER BY date ASC LIMIT 1
) as result on result.type = wt.id');
$query->execute(['current_date' => $current_date]);

// Fetch the result
$result = $query->fetch();

if ($result) {
    echo json_encode($result);
} else {
    echo json_encode(['message' => 'No upcoming sessions found']);
}
