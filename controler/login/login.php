<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/user.php');

if (isset($_GET['input_email']) && isset($_GET['input_password'])) {

	$email = $_GET['input_email'];
	$password = $_GET['input_password'];

	if (true) { // TODO: check if email and password are correct

		if (session_status() !== PHP_SESSION_ACTIVE) session_start();

		$user = new User($email);
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $user->getUsername();

		header("Location: /controler/pages/index.php");
	} else {
		echo "Erreur d'authentification, email ou mot de passe incorrect";
		exit();
	}
} else {
	echo "Erreur d'authentification, champs incomplets";
	exit();
}
