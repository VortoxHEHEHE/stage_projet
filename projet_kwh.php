<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Affichage des donnees de la base de donnees</title>
</head>
<body>
	<?php
	$host = 'localhost';
	$dbName = 'thierry';
	$username = 'root';
	$password = 'Bouvier.12';

	try {
	    $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sql = "SELECT * FROM ecolo";
	    $stmt = $conn->query($sql);

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
	    echo 'Aucunne donnee trouvee dans la base de donnees.';
	}
    } catch (PDOExecption $e) {
	echo 'Erreur de connexion a la base de donnees :' . $e->getMessage();
    }

    $conn = null;
    ?>

<a href="projet_insert.html">Pour ajouter des donnees</a></br>
<a href="supprimer.php">Pour supprimer toutes les donnees de la liste</a>
</body>
</html>
