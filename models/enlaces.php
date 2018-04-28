<?php 

class EnlacesPaginasDB
{
	static public function enlacesDBModel($enlacesModel)
	{
		if(
			$enlacesModel == "inicio" ||
			$enlacesModel == "ingresar" ||
			$enlacesModel == "usuarios" ||
			$enlacesModel == "editar" ||
			$enlacesModel == "salir")
		{
			$modulo = "views/modules/".$enlacesModel.".php";
			return $modulo;
		}
		else if($enlacesModel == "fallo")
		{
			$modulo = "views/modules/ingresar.php";
			return $modulo;
		}
		else if($enlacesModel == "change")
		{
			$modulo = "views/modules/usuarios.php";
			return $modulo;
		}
		else if($enlacesModel == "logged")
		{
			$modulo = "views/modules/inicio.php";
			return $modulo;
		}
		else if($enlacesModel == "notlogged")
		{
			$modulo = "views/modules/inicio.php";
			return $modulo;
		}
		else if($enlacesModel == "notforyou")
		{
			$modulo = "views/modules/ingresar.php";
			return $modulo;
		}
		else if($enlacesModel == "captcha")
		{
			$modulo = "views/modules/ingresar.php";
			return $modulo;
		}

		return "views/modules/registro.php";	
	}
}

