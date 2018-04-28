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

			#VALIDACION DE DATOS LADO SERVER
			#preg_match realiza una comparacion con una
			#expresion regular
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioRegistro"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordRegistro"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailRegistro"]))
			{
				#PROCEDE EL REQUEST
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

	}

	#INGRESO DE USUARIO
	#---------------------------------------
	public function ingresoUsuarioController()
	{
		if(isset($_POST["usuarioIngreso"]))
		{

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"]))
			{
				#PROCEDE REQUEST
				$datosController = [
				"usuario" => $_POST["usuarioIngreso"],
				"password" => $_POST["passwordIngreso"]
				];

				$response = Datos::ingresoUsuarioModel($datosController, "usuarios");

				if ($response['usuario'] == $_POST['usuarioIngreso'] && $response['password'] == $_POST['passwordIngreso'])
				{
					#inicio de la session particular
					$_SESSION["validar"] = true;
					$_SESSION["user"] = $datosController["usuario"];
					header("location:index.php?action=usuarios");
				}
				else
				{
					header("location:index.php?action=fallo");
				}
			}
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
			echo '<td><a href="index.php?action=usuarios&idBorrar='.$user["id"].'"><button>Borrar</button><a></td>';
			echo "</tr>";
		}

	}

	#EDITAR USUARIO
	#------------------------------------------
	public function editarUsuarioController()
	{
		$datos = $_GET["id"];
		$response = Datos::editarUsuarioModel($datos, "usuarios");

		return $response;
	}

	#EDITAR/ACTUALIZAR USUARIO
	#------------------------------------------
	public function actualizarUsuarioController()
	{
		if(isset($_POST["usuarioEditar"]))
		{
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioEditar"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordEditar"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailEditar"]))
			{
				#PROCEDE REQUEST
				$datosController = [
				"id" => $_POST["idEditar"],
				"usuario" => $_POST["usuarioEditar"],
				"password" => $_POST["passwordEditar"],
				"email" => $_POST["emailEditar"]
				];

				$response = Datos::actualizarUsuarioModel($datosController, "usuarios");

				if ($response){
					echo "Operación Exitosa";
					header("location:index.php?action=change");
				}
				else
				{
					echo "Algo salió mal. Por favor Vuelva a intentar más tarde";
				}
			}		

		}
	}

	#BORRAR USUARIO
	#------------------------------------------
	public function borrarUsuarioController()
	{
		if(isset($_GET["action"]))
		{
			if(isset($_GET["idBorrar"]))
			{
				if ($_GET["action"] == "usuarios") {
					
					$id = $_GET["idBorrar"];

					$response = Datos::borrarUsuarioModel($id, "usuarios");

					if ($response) {
						header("location:index.php?action=usuarios");
					}
				}
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