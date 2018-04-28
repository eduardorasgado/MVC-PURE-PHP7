<h1>Bienvenido!</h1>

<?php 

//Si ya esta logeado y entro a ingresar
if ($_GET["action"])
{
	if ($_GET["action"] == "logged")
	{
		echo "Ya estás logueado, que tal si comenzamos!";
	}
}


 ?>