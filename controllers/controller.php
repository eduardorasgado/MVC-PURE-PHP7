<?php 

class MvcController
{

	#LLAMADA A LA PLANTILLA
	#--------------------------------------------

	public function plantilla()
	{
		include("views/template.php");
	}

	#INTERACCION DEL USUARIO
	#----------------------------------------
	public function enlacesPaginasController()
	{
		$enlace = $_GET["action"];

		$response = EnlacesPaginas::enlacesPaginasModel($enlace);

		include $response;
	}
}

 ?>