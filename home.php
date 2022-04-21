<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
	<head>
		<title>Questionnaire - Préambule</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<header>
			<div class="container">
				<h1>Questionnaire</h1>
			</div>
		</header>
		<main>
			<div class="container">
				<?php
					$email = $_SESSION['email'];
					$query = "SELECT nom FROM users WHERE email = '$email' ";
					$select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
					$row = mysqli_fetch_array($select_players);
					echo $row['nom'];
				?>
				<h2>Bienvenue sur le questionnaire</h2>
				<p>Ce questionnaire est porté sur des questions de logique.</p>
				<ul>
				    <li><strong>Nombre de question : </strong><?php echo $total; ?></li>
				    <li><strong>Type : </strong>Choix multiple</li>
				    <li><strong>Temps estimé pour chaque question : </strong><?php echo $total * 0.05 * 60; ?> secondes</li>
				    <li>Vous obtenez <strong>1 point</strong> pour chaque réponse correcte</li>
				</ul>
				<a href="question.php?n=1" class="start">Lancer</a>
				<a href="exit.php" class="add">Retour</a>
			</div>
		</main>
	</body>
</html>

<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>