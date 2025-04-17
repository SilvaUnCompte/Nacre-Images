<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

$page_name = 'Liste des prestations';
$description = 'Votre espace de gestion vous permet de gérer vos prestations. Vous pouvez ajouter, modifier ou supprimer des prestations.';

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/services.php");

?>