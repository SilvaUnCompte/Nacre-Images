<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');

$page_name = 'Calendrier des stages';
$description = 'Le calendrier des stages photo à venir. Réservez ou faite une demande particulière votre par mail ou téléphone. Contactez Gilles Quesnot pour plus d\'informations.';
$workshopTypes = WorkshopType::getAll();
$workshopSessions = WorkshopSession::getOneYearFutureSession();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/calendar.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");