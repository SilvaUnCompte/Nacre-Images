<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

$page_name = 'Liste des stages';
$description = 'Bienvenue sur votre espace de gestion. Vous retrouverez ici la liste de vos stages.';


require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
$all_workshop_type = WorkshopType::getAll();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/stage-list.php");

?>