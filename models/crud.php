<?php 

require_once('conexion.php');

class Datos extends Conexion
{
	#REGISTRO DE USUARIOS
	#------------------------------
	public function registroUsuarioModel($datos, $tabla)
	{		
		/*
		manipularemos la funcion por eso extendimos
		de conexion.

		prepare() prepara una sentencia SQL para ser
		ejecutada por el metodo PDOStatement:execute().
		:name permite y confiere seguridad a la query ante
		ataques externos
		*/
		$query = "INSERT INTO $tabla (usuario, password, email) VALUES (:usuario, :password, :email)";

		$stmt = Conexion::conectar()->prepare($query);

		#reemplazando de forma segura por los reales
		#y con los tres de tipo texto
		$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);

		##ejecutar la query, arroja true o false
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "Error";
		}
	}

	#INGRESO USUARIO
	#---------------------------------------------
	public function ingresoUsuarioModel($datos, $tabla)
	{
		$query = "SELECT usuario, password FROM $tabla WHERE usuario = :usuario";

		$stmt = Conexion::conectar()->prepare($query);

		$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);

		$stmt->execute();

		#fetch obitiene una fila de un conjunto de 
		#resultados asociados al objeto PDO Statement
		return $stmt->fetch();
		#Osea devuelve la coincidencia
	}

	#SELECCION DE DATOS 
	#--------------------------------------------------
	public function vistaUsuariosModel($tabla)
	{
		$query = "SELECT id, usuario, password, email FROM $tabla";
		$stmt = Conexion::conectar()->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll();
	}


}

 ?>