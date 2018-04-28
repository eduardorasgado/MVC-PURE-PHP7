<h1>Bienvenido!</h1>

<?php 

//Si ya esta logeado y entro a ingresar
if ($_GET["action"])
{
	if ($_GET["action"] == "logged")
	{
		echo "Ya estás loguead@, que tal si comenzamos!";
	}
}

if ($_GET["action"])
{
	if ($_GET["action"] == "notlogged")
	{
		echo "Hey no estás loguead@ vaquer@. Que tal si comenzamos!";
	}
}


 ?>