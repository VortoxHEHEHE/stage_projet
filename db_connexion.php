<?php
$host = "localhost";
$dbName = "thierry";
$username = "root";
$password = "Bouvier.12";

try {
	$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExcepetion $e) {
	echo 'Erreur de connexion a la base de donnees : ' . $e->getMessage();
	exit();
}
?>
