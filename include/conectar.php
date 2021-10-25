<?php
	$server='127.0.0.1:3308';
	$user='root';
	$password='';
	$database='farmacia';
	$connection = mysqli_connect($server, $user, $password, $database) or die ('Não possível conectar');
?>