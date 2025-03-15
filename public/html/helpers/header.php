<!DOCTYPE html>
<html lang="fr">

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
				<li><a href="/infos-stage">INFOS STAGES</a></li>
				<li><a href="/prestations">PRESTATIONS</a></li>
				<li><a href="/cheque-cadeau">CHÈQUE CADEAU</a></li>
				<li><a href="/calendrier">CALENDRIER STAGES</a></li>
				<li><a href="/contact">CONTACT</a></li>
			</ul>
		</nav>
	</header>

	<div id="dark"></div>
	<ul id="side-menu">
		<div class="corner"></div>
		<li><a href="/">Accueil</a></li>
		<li><a href="/infos-stage">Infos stages</a></li>
		<li><a href="/prestations">Prestations</a></li>
		<li><a href="/cheque-cadeau">Chèque cadeau</a></li>
		<li><a href="/calendrier">Calendrier stages</a></li>
		<li><a href="/contact">Contact</a></li>
	</ul>