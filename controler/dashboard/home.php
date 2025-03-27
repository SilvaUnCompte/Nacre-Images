<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

$page_name = 'Dashboard';
$description = 'Bienvenue sur votre espace de gestion. Vous pouvez ici gérer vos ateliers, vos sessions d\'ateliers, vos tarifs et vos prestations.';


require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/faq.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
$all_tarifs = Prices::getAll();
$all_faq = FAQ::getAll();
$all_workshop_type = WorkshopType::getAll();
$all_future_session = WorkshopSession::getFutureSessionByDate(Date('Y-m-d'));

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-home.php");

?>