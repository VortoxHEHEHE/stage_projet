<!DOCTYPE html>
<html>
<head>
   <title>Formulaire d'insertion</title>
   <style>
	body {
		font-family: Arial, sans-serif;
		text-align: center;
		padding-top: 50px;
	}

	h2 {
		margin-bottom: 20px;
	}

	form {
		display: inline-block;
		text-align: left;
	}

	label {
		display: block;
		margin-bottom: 10px;
	}

	input[type="text"] {
		width: 200px;
		padding: 5px;
	}

	input[type="submit"] {
		padding: 10px 20px;
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
   <h2>Formulaire d'insertion de donnees</h2>

	<p>Aujourd'hui, nous somme le <span id="dateDuJour"></span>.</p><br>

	<?php
		$url = 'https://accesformation.gklearn.fr/kwh.txt';
		$content = file_get_contents($url);

		preg_match("/(\d+)\s+(\d+)/", $content, $matches);
		$stagiaires = $matches[2];
		$cours = $matches[1];
	?>

	<p>Aujourd'hui, il y a eu <?php echo $stagiaires; ?> stagiaires et <?php echo $cours; ?> cours.</p><br><br>

	<form method="post" action="projet_insert.php">

	<label for="kwh">KWH :</label>
	<input type="text" name="kwh" id="kwh" required><br><br>

	<input type="submit" value="Inserer"><br><br>

	<a href="visu_proj_kwh.php">Pour voir les donnees<a>	

  </form>
</body>

<script> document.getElementById('dateDuJour').textContent = new Date().toLocaleDateString();</script>


</html>
