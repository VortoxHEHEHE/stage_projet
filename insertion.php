<?php
$servername = "localhost";
$username = "root";
$password = "Bouvier.12";
$dbname = "gk_kwh1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
	die("Connexion echouee : " . $conn->connect_error);
}

if (isset($_POST["task"])) {
   $task = $_POST["task"];

   if (!empty($task)) {
	$sql = "INSERT INTO todo_list (content) VALUES ('$task')";

	if ($conn->query($sql) === TRUE) {
	   echo "Tache inseree avec sucee.";
	} else {
	   echo "Erreur lors de l'insertion de la tache : " . $conn->error_connect;
	}
    } else {
	echo "Veuillez saisir une tache.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
   <title>Ajouter une tache</title>
</head>
<body>
  <h1>Ajouter une tache</h1>
  <form method="POST" action="">
	<input type="text" name="task" placeholder"Saisissez une tache">
	<button type="submit">Ajouter</button>
  </form></br>
<a href="todo.php">Pour voir les taches ajoutees</a></br>
<a href="index.html">Retourner sur l'index<a>
</body>
</html>
