<?php session_start(); if (isset($_SESSION['admin'])) {?>

<!DOCTYPE html>
<html>
	<head>
		<title>Espace de gestion</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<header>
			<div class="container">
				<h1>Espace de gestion</h1>
				<a href="index.php" class="start">Questionnaire</a>
				<a href="add.php" class="start">Ajoutez une question</a>
				<a href="allquestions.php" class="start">Toutes les questions</a>
				<a href="players.php" class="start">Classement</a>
				<a href="exit.php" class="start">Déconnexion</a>
			</div>
		</header>
	<h1>Administration</h1>
	<p style="margin: 7px;text-align: center;">Pensez à vous déconnecter après avoir effectué les modifications souhaitées.</p>
	</body>
</html>

<?php } else {header("location: admin.php");}?>