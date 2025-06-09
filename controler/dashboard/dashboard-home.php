<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

$page_name = 'Dashboard';
$description = 'Bienvenue sur votre espace de gestion. Vous pouvez ici gérer vos ateliers, vos sessions d\'ateliers, vos tarifs et vos prestations.';


require_once(ROOT_DIR . '/database/tables/faq.php');
require_once(ROOT_DIR . '/database/tables/news.php');
require_once(ROOT_DIR . '/database/tables/prices.php');
require_once(ROOT_DIR . '/database/tables/services.php');
require_once(ROOT_DIR . '/database/tables/workshop_type.php');
require_once(ROOT_DIR . '/database/tables/workshop_session.php');

$all_faq = FAQ::getAll();
$all_tarifs = Prices::getAll();
$all_service = Services::getAll();
$all_workshop_type = WorkshopType::getAll();
$all_future_session = WorkshopSession::getFutureSessionByDate(Date('Y-m-d'));
$all_news = News::getVisibleNews();

include(ROOT_DIR . "/public/html/dashboad/dashboard-header.php");
include(ROOT_DIR . "/public/html/dashboad/dashboard-home.php");

?>