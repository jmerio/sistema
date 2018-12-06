<?php
	require_once("DbAcad.php");
	$subs_name = $_POST['anio'];
	$insert_value = 'INSERT INTO anio_lectivo ((`id_anio_lectivo`, `anio_lectivocol`)) VALUES (null,"' . $subs_name . '")';

	$result = $conn->query($insert_value);
	
	header('Location: aniolectivos.php');
	

	mysql_close($db_connection);
		
?>