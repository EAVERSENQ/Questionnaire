<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('Mauvais mot de passe!');</script>";
	}
}
// Mot de passe : adminpass123
?>

<html>
	<head>
		<title>Questionnaire - Administration</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<header>
			<div class="container">
				<h1>Administration</h1>
				<a href="index.php" class="start">Questionnaire</a>
			</div>
		</header>
		<main>
			<div class="container">
				<h2>Gestionnaire</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" placeholder="Mot de passe">
				<input type="submit" name="submit" value="Valider"> 
			</div>
		</main>
		<footer>
			<div class="container">
				© 2022 ELLIOT AVERSENQ. TOUS DROITS RÉSERVÉS.
			</div>
		</footer>
	</body>
</html>