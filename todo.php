<?php
$user = "root";
$password = "Bouvier.12";
$database = "thierry";
$table = "ecolo";

try {
	$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
	echo "<h2>TODO</h2><ol>";
	foreach($db->query("SELECT * FROM $table") as $row) {
	 echo "<li>" . $row['date'] ." ". $row['stagiaire'] ." ". $row['cours'] ." ". $row['kwh']. "</li>";
	}
	echo "</ol>";
} catch (PDOException $e) {
      	print "Error! :" . $e->getMessage() . "</br>";
	die();
	}

?>


<html>
<head>
<title>TODO LIST</title>
</head>
<body>
<a href="test_insert.html">Pour ajouter des taches</a></br>
<a href="index.html">Retourner sur l'index</a></br>
<a href="supprimer.php">Supprimer tous les elements de la liste<a>
</body>
</html>
