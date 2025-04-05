<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/faq.php');


if (!isset($_POST["id"]) || !isset($_POST['question']) || !isset($_POST['answer']) || !isset($_POST['rank'])) {
    echo json_encode(['error' => 'id, question, answer and rank parameters are required']);
    exit;
}


$ws = new FAQ($_POST["id"]);
$ws->setQuestion($_POST['question']);
$ws->setAnswer($_POST['answer']);
$ws->setRank($_POST['rank']);
$ws->update();