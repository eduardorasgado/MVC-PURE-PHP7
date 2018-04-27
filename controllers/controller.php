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
		if(isset($_POST["usuarioRegistro"]))
		{
			$datosController = [
			"usuario" => $_POST["usuarioRegistro"],
			"email" => $_POST["emailRegistro"],
			"password" => $_POST["passwordRegistro"]
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

	#INGRESO DE USUARIO
	#---------------------------------------
	public function ingresoUsuarioController()
	{
		if(isset($_POST["usuarioIngreso"]))
		{
			$datosController = [
			"usuario" => $_POST["usuarioIngreso"],
			"password" => $_POST["passwordIngreso"]
			];

			$response = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if ($response['usuario'] == $_POST['usuarioIngreso'] && $response['password'] == $_POST['passwordIngreso'])
			{
				#inicio de la session particular
				$_SESSION["validar"] = true;
				header("location:index.php?action=usuarios");
			}
			else
			{
				header("location:index.php?action=fallo");
			}

			echo "Hola ".$response["usuario"];
		}
	}

	#VISTA DE USUARIOS 
	#------------------------------------
	public function vistaUsuariosController()
	{
		$response = Datos::vistaUsuariosModel("usuarios");

		#imprimiendo en el html de la vista
		foreach ($response as $key => $user) {
			echo "<tr>";
			echo "<td>".$user['usuario']."</td>";
			echo "<td>".$user['password']."</td>";
			echo "<td>".$user['email']."</td>";
			echo '<td><a href="index.php?action=editar&id='.$user["id"].'"><button>Editar</button></a></td>';
			echo "<td><a><button>Borrar</button><a></td>";
			echo "</tr>";
		}

	}

	#EDITAR USUARIO
	#------------------------------------------
	public function editarUsuarioController()
	{
		$datos = $_GET["id"];
		echo "datos";
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