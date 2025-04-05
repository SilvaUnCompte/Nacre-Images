<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/faq.php');

if (!isset($_POST['question']) || !isset($_POST['answer']) || !isset($_POST['rank'])) {
    echo json_encode(['error' => 'rank, question and answer parameters are required']);
    exit;
}

FAQ::create($_POST['question'], $_POST['answer'], $_POST['rank']);

echo json_encode(['success' => true]);