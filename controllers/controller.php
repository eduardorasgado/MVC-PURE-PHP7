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
		$enlace = $this->checkSet();

		$response = EnlacesPaginas::enlacesPaginasModel($enlace);

		include $response;
	}

	#INTERACCCION USUARIO
	#---------------------------------------
	public function enlacesDBController()
	{
		
		$enlace = $this->checkSet();

		$response = EnlacesPaginasDB::enlacesDBModel($enlace);

		include $response;
	}

	#REGISTRO USUARIOS
	#------------------------------------
	public function registroUsuarioController()
	{
		if(isset($_POST["usuario"]))
		{
			$datosController = [
			"usuario" => $_POST["usuario"],
			"email" => $_POST["email"],
			"password" => $_POST["password"]
			];

			$response = Datos::registroUsuarioModel($datosController, "usuarios");	

			if ($response == "success") 
			{
				//con header aseguramos no tener
				//duplicados de usuario por cada
				//vez que actualizamos
				header("location:index.php?action=ok");
			}
			else
			{
				header("location: index.php");
			}
		}

	}

	#-------------------------------------
	private function checkSet()
	{
		if (isset($_GET["action"])) 
		{
			# code...
			return $_GET["action"];
		}
		else
		{
			return $enlace = '';
		}
	}
}

 ?>