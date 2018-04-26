<?php 

require_once('conexion.php');

class Datos extends Conexion
{
	#REGISTRO DE USUARIOS
	#------------------------------
	public function registroUsuarioModels($datos, $tabla)
	{		
		/*
		manipularemos la funcion por eso extendimos
		de conexion.

		prepare() prepara una sentencia SQL para ser
		ejecutada por el metodo PDOStatement:execute().
		:name permite y confiere seguridad a la query ante
		ataques externos
		*/
		$query = "INSERT INTO $tabla (usuario, passsword, email) VALUES (:usuario, :password, :email)";

		$stmt = Conexion::conectar()->prepare($query);

		#reemplazando de forma segura por los reales
		$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR );
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR );
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR );
		
		#$datos['usuario'], $datos['password'], $datos['email']
		$stmt->execute($query);
	}
}

 ?>