<!DOCTYPE html>
<html lang="es">
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
			padding-left: 10vw;
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
			width: 300px;
		}

		.form-group{
			display: block;
			margin-top: 20px;
		}
		.form-group input {
			display: block;			
		}

		/* Habilitar miniscula forzada al usuario en el form usuario
		.form-group input#usuarioRegistro{
			text-transform: lowercase;
		}*/

		.form-group label {
			display: inline-block;
		}
		table {
			margin-left: 0;
		}

		.terms-c {
			margin-bottom: 15px;
		}

		form .submit-button {
			margin-left: 6vw;
			cursor: pointer;
		}
	</style>
	<!--Libreria Jquery-->
	<script type="text/javascript" src="views/js/jquery-3.3.1.min.js"></script>
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

	<!--validacion lado cliente-->
	<script type="text/javascript" src="views/js/validarRegistro.js"></script>
	<script type="text/javascript" src="views/js/validarIngreso.js"></script>
	<script type="text/javascript" src="views/js/validarCambio.js"></script>

</body>
</html>