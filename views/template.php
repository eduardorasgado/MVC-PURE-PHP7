<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Template
	</title>

	<style type="text/css"></style>

</head>
<body>
	<header>
		<h1>LOGOTIPO</h1>
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