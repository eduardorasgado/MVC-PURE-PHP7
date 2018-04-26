<?php 

class EnlacesPaginas
{
	static public function enlacesPaginasModel($enlacesModel)
	{
		if($enlacesModel == "nosotros" ||
			$enlacesModel == "servicios" ||
			$enlacesModel == "contactenos" ||
			$enlacesModel == "inicio")
		{
			$modulo = "views/modules/".$enlacesModel.".php";
			return $modulo;
		}
		return "views/modules/inicio.php";	
	}
}

 ?>