<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="<?= PATH_THEME ?>css/infl-style.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<!-- <script src="/vues/js/infl-main.js?onload=init"></script> -->
	<!-- <script src="https://apis.google.com/js/client.js"></script> -->
	<!-- <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script> -->
	<!-- <script type="text/javascript" src="https://apis.google.com/js/client.js?onload=init"></script> -->

	<title>Influencer</title>
</head>
<body>
	<header class="container-fluid infl-header">
		<div class="row align-items-center">
			<div class="col-md-4 text-center">
				<a href="http://imagemotion.com/"><img src="<?= PATH_THEME ?>img/IM_200x69_BLK.png" alt="ImageMotion"></a>
			</div>
			<div class="col-md-8 text-right">
				<ul>
					<li><a href="http://imagemotion.com/">Home</a></li>
					<li><a href="http://imagemotion.com/expertise">Expertise</a></li>
					<li><a href="http://imagemotion.com/portfolio">Work</a></li>
					<li><a href="http://imagemotion.com/blog">Blog</a></li>
					<li><a href="http://imagemotion.com/careers">Careers</a></li>
					<li><a href="http://imagemotion.com/contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</header>
	<div class="influencer container">
		<?php 
		if (isset($_SESSION['erreur'])) {
			?>
			<div class="msg alert alert-danger" role="alert">
				<?= $_SESSION['erreur'] ?>
			</div>
			<?php 
					unset($_SESSION['erreur']);
		} ?>
		<?php 
			if (isset($_SESSION['succes'])) {
				?>
				<div class="msg alert alert-success" role="alert">
					<?= $_SESSION['succes'] ?>
				</div>
				<?php 
						unset($_SESSION['succes']);
			} ?>