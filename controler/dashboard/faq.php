<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');

$page_name = 'Edition de la FAQ';
$description = 'Bienvenue sur votre espace de gestion. Vous retrouverez ici la FAQ de votre site.';

include(ROOT_DIR . "/public/html/dashboad/dashboard-header.php");
include(ROOT_DIR . "/public/html/dashboad/faq.php");

?>