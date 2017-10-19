<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instagram PDF</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://imorigine:8001/infl/vues/css/infl-style.css">
</head>
<body>
	<div class="influencer container">
		<h2>Resultat recherche Instagram</h2>
		<?php 
			if (isset($_SESSION['temp_html'])) {
				echo $_SESSION['temp_html'];
			} 
		?>
	</div>
</body>
</html>