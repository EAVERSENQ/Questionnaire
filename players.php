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

		
	<h1>Classement</h1>
	<table class="data-table">
		<caption class="title">Retrouvez ci-dessous tous les participants.</caption>
		<thead>
			<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Date</th>
			<th>Points</th>
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $nom = $row['nom'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nom</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
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

