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
		return "views/modules/registro.php";	
	}
}

 ?>