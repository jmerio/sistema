<?php
require_once("DbAcad.php");
	if (isset($_POST['insertar'])) {
		 
		header('Location: aniolectivos.php');

	}elseif(isset($_POST['actualizar'])){
		$update_value = 'UPDATE  anio_lectivo set anio_lectivocol='.$_POST['anio'].' WHERE id_anio_lectivo ='.$_POST['id'];
		if ($conn->query($update_value) === TRUE) {
		echo "Actualizado correctamente";
		} else {
			echo "Error: " . $update_value . "<br>" . $conn->error;
		}
		$conn->close();
		header('Location: aniolectivos.php');

	}elseif ($_GET['accion']=='e') {
		$delete_value = 'DELETE FROM anio_lectivo WHERE id_anio_lectivo ='.$_GET['id'];
		if ($conn->query($delete_value) === TRUE) {
		echo "Eliminado correctamente";
		} else {
			echo "Error: " . $delete_value . "<br>" . $conn->error;
		}
		$conn->close();
		header('Location: aniolectivos.php');		

	}elseif($_GET['accion']=='a'){
		
		header('Location: actualizar_aniolectivo.php?id='.$_GET['id']);
	}
?>