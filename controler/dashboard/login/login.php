<?php
define('ROOT_DIR', __DIR__ . '/../../..');
require_once(ROOT_DIR . '/database/tables/user.php');

if (isset($_POST['input_email']) && isset($_POST['input_password'])) {

	$email = $_POST['input_email'];
	$password = $_POST['input_password'];
	
	if (User::checkLogin($email, $password)) {

		if (session_status() !== PHP_SESSION_ACTIVE) session_start();

		$user = new User($email);
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $user->getUsername();

		header("Location: /dashboard");
	} else {
		echo "Erreur d'authentification, email ou mot de passe incorrect";
		exit();
	}
}