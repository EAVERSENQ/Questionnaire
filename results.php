<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
<html>
	<head>
		<title>Questionnaire - Résultats</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Résultats</h1>
			</div>
		</header>

		<main>
			<div class= "container">
			<h2>Félicitations!</h2> 
				<p>Vous avez terminé le questionnaire.</p>
				<p>Total des points : <?php if (isset($_SESSION['score'])) { echo $_SESSION['score']; }; ?> 			
				</p>
				<a href="question.php?n=1" class="start">Refaire le questionnaire</a>
				<a href="exit.php" class="add">Quitter</a>
			</div>
		</main>
	</body>
</html>
		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>
<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>

