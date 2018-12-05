<?php include 'header.php'; 
require_once("DbAcad.php");
?>

<!--work collections start-->
	<div id="work-collections">
		<div class="container">
		<table class="highlight">			
			<tr>
				<td><a href="ingresoalumno.php">Ingresar</a></td>
			</tr>
			<tr>
				<td><a href="actualizar_alumno.php">Actualizar</a></td>
			</tr>
		</table>
		  <table class="highlight">
			<thead>
			  <tr>
				  <th>Carnet</th>
				  <th>Nombre</th>
				  <th>Operaciones</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
				$sql = "SELECT a.id_alumno as 'Carnet', CONCAT(p.primero_nombre, ' ', p.segundo_nombre, ' ',  p.primer_apellido, ' ', p.segundo_apellido)as 'Nombres' FROM alumno a Inner Join persona p;";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["Carnet"]. " </td><td>" . $row["Nombres"]. "<td> <td><a href=\"administrar_alumnos.php?id=" . $row["Carnet"]. "&accion=a\">Actualizar</a> - <a href=\"administrar_alumnos.php?id=" . $row["Carnet"]. "&accion=e\">Eliminar</a>   </td></tr>";
					}
				}
				?>
			</tbody>
		  </table>
		</div>
	</div>
<!--work collections end-->
<?php include 'footer.php'; ?>