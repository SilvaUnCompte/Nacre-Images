<?php

if (!isset($_POST['page_name']) || !isset($_POST['description']) || !isset($_POST['image']) || !isset($_POST['alt_image']) || !isset($_POST['topic']) || !isset($_POST['title']) || !isset($_POST['paragraph'])) {
    echo json_encode(['error' => 'Missing arguments']);
    exit;
}

$page_name = $_POST['page_name'];
$description = $_POST['description'];
$image = $_POST['image'];
$alt_image = $_POST['alt_image'];
$topic = $_POST['topic'];
$title = $_POST['title'];
$paragraph = $_POST['paragraph'];

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/dashboad/validation-button.html");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
