<?php
require_once("DbAcad.php");
	if (isset($_POST['insertar'])) {
		$sql = "CALL sp_ingresarAlumno($_POST['nombre'], $_POST['nombre2'], $_POST['apellido'], $_POST['apellido2'], $_POST['correo'], $_POST['fecha'], $_POST['sexo'], $_POST['direccion'], $_POST['numero'], $_POST['telefono'], $_POST['estado'])";
				$result = $conn->query($sql);
		header('Location: alumnos.php');

	}elseif(isset($_POST['actualizar'])){
		
		header('Location: alumnos.php');

	}elseif ($_GET['accion']=='e') {
		
		header('Location: alumnos.php');		

	}elseif($_GET['accion']=='a'){
		header('Location: actualizar_alumnos.php');
	}
?>