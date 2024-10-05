<?php

if (!isset($_GET['page_name']) || !isset($_GET['description']) || !isset($_GET['image']) || !isset($_GET['alt_image']) || !isset($_GET['topic']) || !isset($_GET['title']) || !isset($_GET['paragraph'])) {
    echo json_encode(['error' => 'Missing arguments']);
    exit;
}

$page_name = $_GET['page_name'];
$description = $_GET['description'];
$image = $_GET['image'];
$alt_image = $_GET['alt_image'];
$topic = $_GET['topic'];
$title = $_GET['title'];
$paragraph = $_GET['paragraph'];

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");
// include($_SERVER['DOCUMENT_ROOT'] . "/public/html/validation-button.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
