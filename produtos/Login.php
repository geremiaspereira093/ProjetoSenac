<?php
     require '../include/conectar.php';

     if(empty($_POST['usuario']) || empty($_POST['senha'])){
         header('Location: MinhaConta.php');
         exit();
     }
 
     $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
     $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
     
     $consulta = "SELECT ID, USUARIO FROM LOGIN WHERE USUARIO ='{$usuario}' AND SENHA = '{$senha}'";
     $result = mysqli_query($connection,$consulta);
     $row = mysqli_num_rows($result);

     if ($row == 1){
         $_SESSION['usuario'] = $usuario;
         header('Location: pesquisarAdmin.php');
         exit();
     }
     else{
        $_SESSION['msg'] = "Preencha todos os campos!";
        header('Location: MinhaConta.php');
        exit();
     }

 ?>
     

