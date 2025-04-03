<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');

$page_name = 'Calendrier des stages';
$description = 'Bienvenue sur votre espace de gestion. Vous retrouverez ici le calendrier de vos stages.';

$all_topics = WorkshopType::getAll();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/calendar.php");

?>