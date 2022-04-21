<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question ajoutée!'); </script> " ;
	}
	else {
		"<script>alert('Erreur'); </script> " ;
	}
}

?>


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
	<p style="margin: 7px;text-align: center;">Ajoutez une question ci-dessous.</p>
		<main style="background: #fff;">
			<div  class="container">
				<h2 style="text-transform: uppercase;font-size: 14px;font-weight: bold;color: #343d44;">Ajouter une question</h2>
				<form method="post" action="">
					<p>
						<label>Question</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Réponse A</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Réponse B</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Réponse C</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Réponse D</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Réponse correcte</label>
						<select name="answer">
                        <option value="a">Réponse A</option>
                        <option value="b">Réponse B</option>
                        <option value="c">Réponse C</option>
                        <option value="d">Réponse D</option>
                    </select>
					</p>
					<p>
						<input type="submit" name="submit" value="Valider">
					</p>
				</form>
			</div>
		</main>
	</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>