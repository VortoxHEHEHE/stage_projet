<?php

$host = 'localhost';
$dbName = 'thierry';
$username = 'root';
$password = 'Bouvier.12';

try {
     $conn = new PDO("mysql:host=$host; dbname=$dbName", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Erreur de connexion a la base de donnees : ' . $e->getMessage();

   exit();

}


     $stagiaire = $_POST['stagiaire'];
     $cours = $_POST['cours'];
     $kwh = $_POST['kwh'];

$sql = "INSERT INTO ecolo (date, stagiaire, cours, kwh) VALUES (NOW(), :stagiaire, :cours, :kwh)";

try {
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':stagiaire', $stagiaire);
     $stmt->bindParam(':cours', $cours);
     $stmt->bindParam(':kwh', $kwh);
     $stmt->execute();

     echo 'Donnees inserees avec succes.';
     echo '<script>window.location.href = "projet_kwh.php";</script>';
}catch (PDOExecption $e) {
     echo 'Erreur lors de l\'sertion des donnees : ' .$e->getMessage();

    exit();
}


$conn = null;

?>
