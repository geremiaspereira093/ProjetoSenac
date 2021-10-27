<?php

	require 'include/conectar.php';

	$id = $_GET["id"];
	
	$sql = "delete from remedios where id = $id";
		
	$result = mysqli_query($connection, $sql);
	
	mysqli_close($connection);
		
	header('Location: pesquisarAdmin.php');

?>