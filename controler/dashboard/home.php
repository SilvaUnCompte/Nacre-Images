<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

$page_name = 'Dashboard';
$description = 'Bienvenue sur votre espace de gestion. Vous pouvez ici gérer vos ateliers, vos sessions d\'ateliers, vos tarifs et vos prestations.';

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-home.php");

?>

<!-- 
TODO: Dans l'odre à faire : 
Page global dashboad : Cadre avec workshop_type, workshop_session, tarif, prestation ?
 > Dans une iframe -> Page list de workshop (avec bouton edit, delete, create)
 > Dans une iframe -> Page list de workshop_session (avec bouton edit, delete, create) trier par mois et une date d'observation
Page de création & edition de workshop :
 > Avec overview en temps réel
Page de création & edition de workshop_session
...
-->