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

				//ENCRIPTAR PASSWORD / USANDO HASH BLOWFISH
				//CARACTERES ESPECIALES NUMEROS Y MAYUSCULAS
				$encrypted = crypt($_POST["passwordRegistro"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				#PROCEDE EL REQUEST
				$datosController = [
				"usuario" => $_POST["usuarioRegistro"],
				"email" => $_POST["emailRegistro"],
				"password" => $encrypted
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
			else
			{
				echo "Algo salio mal. Escribe bien los datos que se piden";
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

				#Encriptar
				$encrypted = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


				#PROCEDE REQUEST
				$datosController = [
				"usuario" => $_POST["usuarioIngreso"],
				"password" => $encrypted
				];

				$response = Datos::ingresoUsuarioModel($datosController, "usuarios");

				#para comprobar intentos fallidos
				$intentos = $response["intentos"];
				$usuario = $_POST["usuarioIngreso"];
				$maximoIntentos = 4;

				if ($intentos < $maximoIntentos) {
					#comparar encriptados y usuarios
					if ($response['usuario'] == $_POST['usuarioIngreso'] && $response['password'] == $encrypted)
					{
						#inicio de la session particular
						$_SESSION["validar"] = true;
						$_SESSION["user"] = $datosController["usuario"];
						header("location:index.php?action=usuarios");
					}
					else
					{
						#incremento a numero de intentos
						++$intentos;

						#Datos para actualizar intentos en la tabla y usuario
						$datosController1 = [
							"usuarioActual" => $usuario,
							"actualizarIntentos" => $intentos
						];

						#llamado a modelo para actualizar intentos
						$responseActualizarIntentos = Datos::intentosUsuarioModel($datosController1, "usuarios");

						header("location:index.php?action=fallo");
					}
				}
				else
				{
					echo "Te has excedido del maximo de intentos";
				}
			}
			else
			{
				echo "Algo salio mal. Escribe bien los datos que se piden";
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
			$decrypted = $user['password'];
			echo "<tr>";
			echo "<td>".$user['usuario']."</td>";
			echo "<td>".$decrypted."</td>";
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
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioEditar"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordComprobar"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordNew"]) &&
			 	preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailEditar"]))
			{

				#Encriptar
				$encryptedC = crypt($_POST["passwordComprobar"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$encryptedN = crypt($_POST["passwordNew"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


				#COMPROBANDO OLD PASSWORD
				$datosController1 = [
				"id" => $_POST["idEditar"],
				"usuario" => $_POST["usuarioEditar"],
				"password" => $encryptedC,
				"email" => $_POST["emailEditar"]
				];

				$responseOld = Datos::ingresoUsuarioModel($datosController1, "usuarios");

				#comparar encriptados y usuarios
				if ($responseOld['usuario'] == $_POST['usuarioEditar'] && $responseOld['password'] == $encryptedC)
				{
					#PROCEDE REQUEST /ESCRIBIENDO NUEVA PASS
					$datosController = [
					"id" => $_POST["idEditar"],
					"usuario" => $_POST["usuarioEditar"],
					"password" => $encryptedN,
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
				else
				{
					echo "No coincide la contraseña anterior.";
				}
			}
			else
			{
				echo "Algo salio mal. Escribe bien los datos";
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