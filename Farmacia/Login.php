<?php
     require 'include/conectar.php';

     if(empty($_POST['usuario']) || empty($_POST['senha'])){
         echo "<script>window.location.href = 'MinhaConta.php';</script>";
         exit();
     }
 
     $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
     $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
     
     $consulta = "SELECT ID, USUARIO FROM LOGIN WHERE USUARIO ='{$usuario}' AND SENHA = '{$senha}'";
     $result = mysqli_query($connection,$consulta);
     $row = mysqli_num_rows($result);

     echo($row);

     if ($row >0){
         $_SESSION['usuario'] = $usuario;
         echo "<script>window.location.href = 'pesquisarAdmin.php';</script>";
         exit();
     }
     else{
        echo "<script>window.location.href = 'MinhaConta.php';</script>";
        exit();
     }

 ?>
     

