<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');

$page_name = 'Calendrier des stages';
$description = 'Le calendrier des stages photo à venir. Réservez ou faite une demande particulière votre par mail ou téléphone. Contactez Gilles Quesnot pour plus d\'informations.';
$workshopTypes = WorkshopType::getAll();
$workshopSessions = WorkshopSession::getFutureSession();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/workshop-info.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");


// Note type :
// 0 : Régulier
// 1 : Exceptionnel
// 2 : Sur demande
// 3 : Semaine