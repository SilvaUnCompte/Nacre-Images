<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/logo325.jpg" />
    <meta name="description" content=<?php echo $description ?>>
    <link rel="stylesheet" href="/public/styles/dashboard/header/header.css">
    <link rel="stylesheet" href="/public/styles/dashboard/generics/generics.css">
    <title><?php echo $page_name ?></title>
</head>

<body>
    <header>
        <nav id="first-header">
            <ul id="ul-header">
                <li><a href="/dashboard">DASHBOARD</a></li>
                <li><a href="/dashboard/calendrier">CALENDRIER STAGES</a></li>
                <li><a href="/dashboard/tarifs">TARIFS</a></li>
                <li><a href="/dashboard/liste-des-stages">LISTE DES STAGES</a></li>
            </ul>
        </nav>
        <div class="inline-container log-data">
            <a href="/controler/dashboard/login/logout.php">
                <p><?php echo $_SESSION['username'] ?></p>
            </a>
        </div>
    </header>