<?php

$host = 'localhost';
$dbname = 'thierry';
$username = 'root';
$password = 'Bouvier.12';

try {
     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion a la base de donnees : ' . $e->getMessage();

    exit();
}


$tableName = 'ecolo';
$columnName = 'date';
$columnName2 = 'stagiaire';
$columnName3 = 'cours';
$columnName4 = 'kwh';
try {

   $sql1 = "TRUNCATE TABLE ecolo";
   $stmt1 = $conn->prepare($sql1);
   $stmt1->execute();

     echo 'Les elements de la colonne ont ete supprimes avec succes.';
     echo '<script>window.location.href = "projet_kwh.php";</script>';
} catch (PDOException $e) {
     echo 'Erreur lors de la suppression des elements : ' . $e->getMessage();

     exit();
}


$conn = null;
?>
