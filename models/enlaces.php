<?php 

class EnlacesPaginasDB
{
	static public function enlacesDBModel($enlacesModel)
	{
		if($enlacesModel == "ingresar" ||
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
		return "views/modules/registro.php";	
	}
}

 ?>