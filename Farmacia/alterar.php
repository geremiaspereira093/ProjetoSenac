<?php
	
	require 'include/conectar.php';
	
	if (!empty($_POST)){
		
		$id = $_POST["hddId"];
		$produto = $_POST['txtNome'];
		$valor = $_POST['txtValor'];
		
				
		$sql = "update remedios set produto = '$produto'";
		

		$sql = $sql . ', valor = ';		 
		if ($produto != ''){
			$sql = $sql . "'$valor'";
		}else{
			$sql = $sql . 'NULL';
		}
		
		$sql = $sql . " where id = $id";
		
		//echo'sql = ' . $sql;
		//echo $sql;
		
				
		$result = mysqli_query($connection, $sql);
		
		mysqli_close($connection);
		
		header('Location: pesquisarAdmin.php');		
	}

?>