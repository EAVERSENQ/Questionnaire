	<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
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
	<table class="data-table">
		<caption class="title">Retrouvez ci-dessous toutes les questions.</caption>
		<thead>
			<tr>
				<th>N°</th>
				<th>Question</th>
				<th>Réponse A</th>
				<th>Réponse B</th>
				<th>Réponse C</th>
				<th>Réponse D</th>
				<th>Réponse correcte</th>
				<th>Modifier</th>
			</tr>
		</thead>
		<tbody>

        <?php
            $query = "SELECT * FROM questions ORDER BY qno DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <a href='editquestion.php?qno=$qno'> Edit </a></td>";
                echo "</tr>";
             }
         }
        ?>
		</tbody>
	</table>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>


