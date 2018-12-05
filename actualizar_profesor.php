<?php include 'header.php'; 
require_once("DbAcad.php");
?>

<!--work collections start-->
	<div id="work-collections">
		<div class="container">
		  <table class="highlight">			
			<tr>
				<td><a href="profesores.php">Listado</a></td>
			</tr>
			<tr>
				<td><a href="actualizar_profesores.php">Actualizar</a></td>
			</tr>
		</table>
		<form action='administrar_profesor.php' method='post'>
			<table>
				<tr>
					<td>Primer Nombre:</td>
					<td> <input type='text' name='nombre'></td>
				</tr>
				<tr>
					<td>Segundo Nombre:</td>
					<td> <input type='text' name='nombre2'></td>
				</tr>
				<tr>
					<td>Primer apellido:</td>
					<td> <input type='text' name='apellido'></td>
				</tr>
				<tr>
					<td>Segundo apellido:</td>
					<td> <input type='text' name='apellido2'></td>
				</tr>
				<tr>
					<td>Correo:</td>
					<td><input type='text' name='correo' ></td>
				</tr>
				<tr>
					<td>Fecha nacimiento:</td>
					<td><input type='text' name='fecha' ></td>
				</tr>
				<tr>
					<td>Genero:</td>
					<td><input type='text' name='sexo' ></td>
				</tr>
				<tr>
					<td>Direccion:</td>
					<td><input type='text' name='Direccion' ></td>
				</tr>
				<tr>
					<td>numero:</td>
					<td><input type='text' name='numero' ></td>
				</tr>
				<tr>
					<td>telefono:</td>
					<td><input type='text' name='telefono' ></td>
				</tr>
				<tr>
					<td>Estado:</td>
					<td><input type='text' name='estado' ></td>
				</tr>
				<input type='hidden' name='insertar' value='insertar'>
			</table>
			<input type='submit' value='Guardar'>

		</form>
		</div>
	</div>
<!--work collections end-->
<?php include 'footer.php'; ?>