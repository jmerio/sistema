<?php
require_once("DbAcad.php");
	if (isset($_POST['insertar'])) {
		 
		header('Location: aniolectivos.php');

	}elseif(isset($_POST['actualizar'])){
		
		header('Location: aniolectivos.php');

	}elseif ($_GET['accion']=='e') {
		
		header('Location: aniolectivos.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: actualizar_alumnos.php');
	}
?>