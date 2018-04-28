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

#inicio de session
session_start();

$mvc = new MvcController();
$mvc->plantilla();

/*
Es recomendable quitar la etiqueta de final al documento de PHP puro,
esto es debido a que da espacio a inyeccion de codigo malicioso debido a ataques externos.

Evitamos salida del buffer con ello

*/