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
		if (!empty($_GET)) 
		{
			# code...
			$enlace = $_GET["action"];
		}
		else
		{
			$enlace = '';
		}

		$response = EnlacesPaginas::enlacesPaginasModel($enlace);

		include $response;
	}
}

 ?>