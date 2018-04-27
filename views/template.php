<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Template
	</title>

	<style type="text/css">
		body {
			font-family: lato;
		}
		h1 {
			text-align: center;
		}
		.navbar {
			background: #343D46FF;
			color: white;
			padding: 10px 0px;
		}
		.navbar ul {
			padding-left: 18vw;
		}
		.navbar li {
			display: inline-block;
			padding-left: 10vw;
		}
		.navbar a {
			color: white;
			text-decoration: none;
			font-size: 1.2em;
		}
		section {
			width: 1000px;
			margin: auto;
		}
		form {
			margin-left: 27vw;
		}
		form input {
			display: block;
			margin-top: 20px;
		}
		table {
			margin-left: 15vw;
		}
	</style>

</head>
<body>
	<header>
		<h1>The Gaussian Company</h1>
	</header>
	<?php 
	include("modules/navegacion.php");
	 ?>
	<section>
		<?php 
		$mvc = new MvcController();
		/*$mvc->enlacesPaginasController();*/
		$mvc->enlacesDBController();
		 ?>
	</section>
</body>
</html>