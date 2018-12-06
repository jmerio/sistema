<?php include 'header.php'; 
require_once("DbAcad.php");
?>

<!--work collections start-->
	<div id="work-collections">
		<div class="container">
		<table class="highlight">			
			<tr>
				<td><a href="aniolectivos.php">Años lectivos</a></td>
			</tr>
		</table>
		  <form action="administrar_aniolectivo.php" method="POST">
			<h2><em>Formulario de Registro</em></h2>  
			 <input type='hidden' name='id' value='<?php echo $_GET['id']?>'>
			  <label for="anio">Año lectivo <span><em>(requerido)</em></span></label>
			  <input type="text" name="anio" class="form-input" required/>   
			  <input type='hidden' name='actualizar' value='actualizar'>
			 <center> <input class="form-btn" name="submit" type="submit" value="Actualizar" /></center>
			</p>
		  </form>
		</div>
	</div>
<!--work collections end-->
<?php include 'footer.php'; ?>