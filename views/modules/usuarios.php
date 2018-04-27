
<h1>USUARIOS</h1>

<table border="1">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th>Editado</th>
			<th>Borrado</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>Juan</td>
			<td>1234</td>
			<td>juan@gmail.com</td>
			<td><button>Editar</button></td>
			<td><button>Borrar</button></td>
		</tr>
	</tbody>
</table>

<?php 

$ingreso = new MvcController();
$users = $ingreso->vistaUsuariosController();

foreach ($users as $key => $user) {
	echo $user["id"].", ".$user["usuario"].", ".$user["email"]."<br>";
}

 ?>