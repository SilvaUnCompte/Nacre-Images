<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

// <button onclick="overview()">Click me</button> // TODO: move ça dans une page de création de workshop

// <iframe name="my_iframe" src="not_submitted_yet.aspx"></iframe>

// <script src="/public/js/dashboad/workshop.js" defer></script>
