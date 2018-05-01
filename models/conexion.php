<?php 

class Conexion 
{
	public function conectar()
	{
		$host = "host=localhost;";
		$db = "dbname=gaussian";
		$username = "root";
		$pass = "";

		#OBJETO PDO PARA MANEJO DE DB
		$link = new PDO("mysql:".$host.$db, $username, $pass);
		return $link;
	}
}
