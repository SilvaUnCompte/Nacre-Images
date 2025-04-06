<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}
if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: /dashboard/liste-des-stages");
    exit();
}

$page_name = 'Editeur de stage';
$description = 'Bienvenue sur l\'éditeur de stage, vous pouvez modifier les informations de chaque stage.';
$id = $_GET['id'];
$edition = ($id >= 0);
$workshop_type = null;

if ($edition) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
    $workshop_type = new WorkshopType($id);
}

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/dashboard-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/stage-editor.php");
