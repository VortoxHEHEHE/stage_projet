<!DOCTYPE html>
<html>
<head>
	<title>Affichage des donnees de la base de donnees</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			text-align: center;
			padding-top: 50px;
		}

		h1 {
			margin-bottom: 20px;
		}

		h2 {
			margin-bottom: 10px;
		}

		form {
			display: inline-block;
			text-align; left;
			margin-bottom: 20px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}

		select,
		input[type="text"],
		input[type="submit"] {
			padding: 5px;
			width: 150px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			border: none;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Affichage des donnees de la base de donnees</h1>

	<?php

		require_once 'db_connexion.php';

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$mois = $_POST['mois'];
			$annee = $_POST['annee'];

			$sql = "SELECT * FROM ecolo WHERE MONTH(date) = :mois AND YEAR(date) = :annee";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':mois', $mois);
			$stmt->bindParam(':annee', $annee);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {

				echo '<table>';
				echo '<tr><th>Date</th><th>Stagiaires</th><th>Cours</th><th>KWH</th></tr>';


				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					echo '<tr>';
					echo '<td>' . $row['date'] . '</td>';
					echo '<td>' . $row['stagiaire'] . '</td>';
					echo '<td>' . $row['cours'] . '</td>';
					echo '<td>' . $row['kwh'] . '</td>';
					echo '</tr>';
				}

				echo '</table>';
			} else {
				echo 'Aucune donnees trouvee pour le mois ' . $mois . ' de l\'annee ' . $annee. '.';
			}
		}

	$conn = null;
	?>

	<h2>Filtre par mois et annee</h2>

	<form method="POST" action="">
		<label for="mois">Mois : </label>
		<select name="mois" id="mois">
			<option value="1">Janvier</option>
			<option value="2">Fevrier</option>
			<option value="3">Mars</option>
			<option value="4">Avril</option>
			<option value="5">Mai</option>
			<option value="6">Juin</option>
			<option value="7">Juillet</option>
			<option value="8">Aout</option>
			<option value="9">Septembre</option>
			<option value="10">Octobre</option>
			<option value="11">Novembre</option>
			<option value="12">Decembre</option>

		</select>
		<br><br>

		<label for="annee">Annee :</label>
		<input type="text" name="annee" id="annee" required>
		<br><br>

		<input type="submit" value="Afficher">
	</form>
	<br><br>

<a href="projet_insert2.php">Pour ajouter des donnees<a>

</body>
</html>
