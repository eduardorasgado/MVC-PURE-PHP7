<?php 

/*
En el index se muestra la salida de las vistas al usuario
 y también a través de este enviaremos las distintas acciones
 que el usuario envie al controlador
*/
require_once('models/crud.php');
require_once('models/enlaces.php');
require_once('controllers/controller.php');
/*require_once('models/model.php');*/

session_start();
$mvc = new MvcController();
$mvc->plantilla();

 ?>