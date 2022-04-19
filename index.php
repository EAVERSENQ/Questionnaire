<?php
session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['nom'])) {
if (isset($_POST['email'])) {
$nom = mysqli_real_escape_string($conn , $_POST['nom']);
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from users WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE users SET played_on = '$played_on' WHERE nom = '$nom' and email = '$email' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	else {
		$played_on = date('Y-m-d H:i:s');
		$query = "INSERT INTO users(nom,email,played_on) VALUES ('$nom','$email','$played_on')";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
		if (mysqli_affected_rows($conn) > 0) {
			$query2 = "SELECT * FROM users WHERE email = '$email' ";
			$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
			if (mysqli_num_rows($run2) > 0) {
				$row = mysqli_fetch_array($run2);
				$id = $row['id'];
				$_SESSION['id'] = $id;
				$_SESSION['email'] = $row['email'];
				header("location: home.php");
			}
	}
	else {
		echo "<script> alert('Erreur'); </script>";
	}
	}
}
else {
	echo "<script> alert('Adresse-email incorrecte!'); </script>";
}
}
}
?>

<html>
	<head>
		<title>Questionnaire - Home </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<header>
			<div class="container">
				<h1>Questionnaire</h1>
				<a href="index.php" class="start">Questionnaire</a>
				<a href="admin.php" class="start">Administration</a>
			</div>
		</header>
		<main>
			<div class="container">
				<h2>Entrez vos informations</h2>
				<form method="POST" action="">
				<input type="nom" name="nom" required="" placeholder="Nom">
				<input type="email" name="email" required="" placeholder="Email">
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