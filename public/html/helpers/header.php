<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/assets/images/logo325.jpg" />
	<meta name="theme-color" content="#1b1d20" />
	<meta name="description" content=<?php echo $description ?>>
	<link rel="stylesheet" href="/public/styles/header/header.css">
	<link rel="stylesheet" href="/public/styles/generics/generics.css">
	<title><?php echo 'Nacre-Images - ' . $page_name ?></title>
</head>

<body>

	<header id="header">
		<nav id="first-header">
			<img id="navicon" src="/assets/images/icons/navicon.webp" alt="navicon" loading="lazy" onclick="show_navbar()">
			<ul id="ul-header">
				<li><a href="/">ACCUEIL</a></li>
				<li><a href="/contact">CONTACT</a></li>
				<li><a href="/infos-stage">INFOS STAGES</a></li>
				<li><a href="/cheque-cadeau">CHÈQUE CADEAU</a></li>
				<li><a href="/prestations">PRESTATIONS</a></li>
				<li><a href="/calendrier">CALENDRIER STAGES</a></li>
			</ul>
		</nav>
	</header>

	<!-- <div id="dark"></div>

	<div class="corner-back"></div> // TODO: faire tarif + list des stages
	<ul id="side-menu">
		<div class="corner"></div>
		<li><a href="/controler/pages/index.php">Overview</a></li>
		<li><a href="/controler/pages/accounts.php">Accounts</a></li>
		<li><a href="/controler/pages/budget.php">Budget</a></li>
		<li><a href="/controler/pages/analytics.php">Analytics</a></li>
		<li><a href="/controler/pages/operations.php">Operations</a></li>
		<li><a href="/controler/pages/verification.php">Verification</a></li>
		<li><a href="/controler/pages/events.php">Events</a></li>
</ul> -->