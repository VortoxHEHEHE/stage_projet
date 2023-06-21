<?php

$url = 'https://www.google.com';

$content = file_get_contents($url);

if ($content === false) {
	echo 'Erreur lors de la recuperation du contenu de la page.';

	exit();
}

$pattern = '/<title>(.*?)<\/title>/';
if (preg_match($pattern, $content, $matches)) {
    $data = $matches[1];
    echo 'Donnee recuperee : ' . $data;
} else {
    echo 'Aucune donnee corespondante trouvee sur la page.';

    exit();
}

$host = "localhost";
$username = "root";
$password = "Bouvier.12";
$dbname = "gk_kwh1";


$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


$sql = "INSERT INTO todo_list(content) VALUES (:data)";


$stmt = $conn->prepare($sql);
$stmt->bindParam(':data', $data);
$stmt->execute();

echo 'Donnee inseree avec succes dans la base de donnees.';


$conn = null;
?>

