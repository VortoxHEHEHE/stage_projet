<?php
require_once 'db_connexion.php';

$url = 'https://accesformation.gklearn.fr/kwh.txt';

     $html = file_get_contents($url);

     $pattern = '/(\d+)\s+(\d+)/';
     if (preg_match($pattern, $html, $matches)) {
     $stagiaire = $matches[2];
     $cours = $matches[1];
     $kwh = $_POST['kwh'];

$sql = "INSERT INTO ecolo (date, stagiaire, cours, kwh) VALUES (NOW(), :stagiaire, :cours, :kwh)";

try {
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':stagiaire', $stagiaire);
     $stmt->bindParam(':cours', $cours);
     $stmt->bindParam(':kwh', $kwh);
     $stmt->execute();

     echo 'Donnees inserees avec succes.';
     header("Location: visu_proj_kwh.php");
}catch (PDOExecption $e) {
     echo 'Erreur lors de l\'sertion des donnees : ' .$e->getMessage();

    exit();
  }
}
$conn = null;

?>
