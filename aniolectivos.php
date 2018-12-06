<?php include 'header.php'; 
require_once("DbAcad.php");
?>

<!--work collections start-->
	<div id="work-collections">
		<div class="container">
		<table class="highlight">			
			<tr>
				<td><a href="ingresoaniolectivo.php">Años lectivos</a></td>
			</tr>
		</table>
		  <table class="highlight">
			<thead>
			  <tr>
				  <th>Id</th>
				  <th>Año</th>
				  <th>Operaciones</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
				$sql = "SELECT * from anio_lectivo";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["id_anio_lectivo"]. " </td><td>" . $row["anio_lectivocol"]. "<td> <td><a href=\"administrar_aniolectivos.php?id=" . $row["id_anio_lectivo"]. "&accion=a\">Actualizar</a> - <a href=\"administrar_aniolectivos.php?id=" . $row["id_anio_lectivo"]. "&accion=e\">Eliminar</a>   </td></tr>";
					}
				}
				?>
			</tbody>
		  </table>
		</div>
	</div>
<!--work collections end-->
<?php include 'footer.php'; ?>