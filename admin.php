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
?>

<html>
	<head>
		<title>Questionnaire - Identification</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<header>
			<div class="container">
				<h1>Identification</h1>
				<a href="index.php" class="start">Questionnaire</a>
			</div>
		</header>
		<main>
			<div class="container">
				<h2>Accès administration</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" placeholder="Mot de passe">
				<input type="submit" name="submit" value="Valider"> 
			</div>
		</main>
	</body>
</html>