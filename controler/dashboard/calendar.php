<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/workshop_type.php');

$page_name = 'Calendrier des stages';
$description = 'Bienvenue sur votre espace de gestion. Vous retrouverez ici le calendrier de vos stages.';

$all_topics = WorkshopType::getAll();
usort($all_topics, function($a, $b) {
    return strcmp($a['topic_name'], $b['topic_name']);
});

include(ROOT_DIR . "/public/html/dashboad/dashboard-header.php");
include(ROOT_DIR . "/public/html/dashboad/calendar.php");

?>