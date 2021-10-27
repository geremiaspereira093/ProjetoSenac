<?php
	/*Configurações Banco Local*/
	$server='127.0.0.1:3308';
	$user='root';
	$password='';
	$database='farmacia';
	$connection = mysqli_connect($server, $user, $password, $database) or die ('Não possível conectar');
	
	/*Configurações Banco Hospedagem*/
	//  $server='localhost';
	//  $user='id17820698_gere93';
    //  $password='xjtR4PpP>\S7}ps$';
    //  $database='id17820698_farmaciasenac';
	//  $connection = mysqli_connect($server, $user, $password, $database) or die ('Não possível conectar');
?>