<?php 

class Conexion 
{
	public function conectar()
	{
		$host = "host=ec2-54-235-109-37.compute-1.amazonaws.com;";
		$db = "dbname=d2jb2jkmro7k9c";
		$username = "agxgootzynkeiu";
		$pass = "7f78acc66518dbea22617dc68d36c5a6f31b5e8855cdf0fa26dbdb41120682d8";

		#OBJETO PDO PARA MANEJO DE DB
		$link = new PDO("mysql:".$host.$db, $username, $pass);
		return $link;
	}
}
