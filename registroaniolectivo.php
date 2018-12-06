<?php
	require_once("DbAcad.php");
	$subs_name = $_POST['anio'];
	$insert_value = 'INSERT INTO anio_lectivo (`id_anio_lectivo`, `anio_lectivocol`) VALUES (null,"' . $subs_name . '")';
	if ($conn->query($insert_value) === TRUE) {
    echo "Creado correctamente";
	} else {
		echo "Error: " . $insert_value . "<br>" . $conn->error;
	}

	$conn->close();
	header('Location: aniolectivos.php');
	

	mysql_close($db_connection);
		
?>