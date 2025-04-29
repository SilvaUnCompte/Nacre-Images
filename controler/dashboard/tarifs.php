<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');

$page_name = 'Liste des tarifs';
$description = 'Bienvenue sur votre espace de gestion. Vous retrouverez ici les tarifs de vos stages.';

include(ROOT_DIR . "/public/html/dashboad/dashboard-header.php");
include(ROOT_DIR . "/public/html/dashboad/tarifs.php");

?>