<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connexion.php';


if (isset($_SESSION['utilisateur'])) {

	header("Location: projet_insert.php");
	exit();
}

if (isset($_POST['submit'])) {
	$nom_utilisateur = $_POST['nom_utilisateur'];
	$mot_de_passe = $_POST['mot_de_passe'];

	$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = :nom_utilisateur";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nom_utilisateur', $nom_utilisateur);
	$stmt->execute();
	$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {

	$_SESSION ['utilisateur'] = $utilisateur['nom_utilisateur'];

	header("Location: projet_insert.php");
	exit();
   } else {

	$message = "Nom d'utilisateur ou mot de passe incorrect.";
   }
}

$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
</head>
<body>
	<h2>Connexion</h2>
	<?php if (isset($message)) { echo "<p>$message</p>"; } ?>
	<form method="post" action="">
		<label for="nom_utilisateur">Nom d'utilisateur :</label>
		<input type="text" name="nom_utilisateur" required><br><br>

		<label for="mot_de_passe">Mot de passe :</label>
		<input type="password" name="mot_de_passe" required><br><br>

		<input type="submit" name="submit" value="Se connecter">
	</form>
</body>
</html>
