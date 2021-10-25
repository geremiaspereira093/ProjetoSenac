<?php
    session_start();
    require '../include/conectar.php';
    $consulta_remedios = " SELECT * FROM remedios";
    //var_dump($result_remedios);
    $result_Remedios = mysqli_query($connection, $consulta_remedios);   
   
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    

    <title>Drogaria SENAC</title>
    <!-- css reset-->
    <link href="css/reset.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    

    <style>
      a{
        color: white ;
      }
      a>p{
        color: blue;
        font-size: 17px;
      }
        a:link {
            text-decoration: none;
        }
    
      div.card-body{
        position: relative;
        margin: 0px;
        padding: 0px;
      }
      .card.mb-4.box-shadow{
        width: 182px;
        
        margin: 0 120px 0 50px;
        height: 240px;
        line-height: 50px;
        text-align: center;
      }
      #Categorias{
        color: white;
        border-radius: 20px;
        width: 180px;
        height: 32px;
        float: left;
        background-color: #006485;
        line-height: 32px;
        text-align: center;
        margin-right: 20px;

      }

      #btnCategorias{
        
        border-radius: 0px;
        border: none;
        border-right: 1px solid white;
        height: 32px;
        padding-top: 0px;
      }
      .card.mb-4.box-shadow{
        /*Divs dos produtos*/
        position:relative;        
        top: 0px;
        left: 90px;
      }
      .container.d-flex.justify-content-between{
        padding-left: 400px;
      }
      .navbar-brand{
        font-size: 50px;

      }
      
      #pesq{
        width: 50%;
        padding: 2px 0 0 10px;
        border-radius: 20px;
        height: 30px;
        float: left;
        margin-top:2px;
        margin-right: 30px;
        background: white;
      }
      #txtPesq{
        border: none;
        width: 92%;
        float: left;
      }
      #txtPesq:focus{
        /*tira contorno do input quando clicado*/
        outline: 0;
      }
      #lupa{
        width:6%;
        background-color: white;
        float: left;
        border-left: 1px solid gray;
      }
      #submenu{

        float: left;
        color: white;        
        margin-top: -8px;
      }

      #sobre, #contato, #carrinho, #conta{
        margin-right: 30px;
        padding-bottom: 0px;
        line-height: 45px;
        font-size: 20px;
        float: left;
      }
      
      a>img{
        margin: 5px 5px -5px 0;
      }

      #divMenu{
        padding: 0px;
        /* background-color: #00BFFF!important; */
      }
      #divMenu>p{
        text-align:center;
      }
      .formsMinhaConta{
          color: black;
          
          padding: 0 20px 0 20px;
          font-size:20px;
          width: 100%;
          margin: 40px 0 0 0px;
      }
      #formLogin{
        padding: 0 35px 0 0;
        border-right:1px solid gray;
      }
      main>img{
        margin: 8px 5px 0 70px;
        width: 25px;
        height: 23px;
        float: left;
      }
      h2{
        color:#006485;
        font-size: 30px;
        margin: 20px 0 0 70px;
      }
      form>h3{
        color:#006485;
        font-size: 25px;
        
      }
      form>img{
        margin: 5px 5px 0 0;
        width: 25px;
        height: 23px;
        float: left;
      }
      .Infos{
          /*inputs dos forms*/
          border-radius: 20px;
          border: 1px solid #ccc;
          box-shadow: 2px 1px 5px 0px rgba(50, 50, 50, 0.2);
          width: 100%;
          padding: 5px   0 5px 10px;
          outline: 0;
      }

      #divLogin{
        padding-left: 50px;
        margin-left: 20px;
        width: 50%;
        height: 472px;
        float: left;
        
      }
      
      #divCadastro{        
        padding-left: 0px;
        margin-left: 20px;
        width: 45%;
        height: 472px;
        float: left;
      }
      #btnEntrar{
        text-align: center;
        width: 20%;
        color: white;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid gray;
        box-shadow: 2px 1px 5px 0px rgba(50, 50, 50, 0.2);
        background: #006485;
        
      }
      #btnCadastrar{
        text-align: center;
        width: 25%;
        color: white;
        margin-top: 35px;
        border-radius: 5px;
        border: 1px solid gray;
        box-shadow: 2px 1px 5px 0px rgba(50, 50, 50, 0.2);
        background: #006485;
        
      }
    </style>
  </head>
  <body style="size: 300px;">
      <header>
          <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
              <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                  <h4 class="text-white">About</h4>
                  <p class="text-muted">farmacia on.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                  <h4 class="text-white">Contact</h4>
                  <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Follow on Twitter</a></li>
                    <li><a href="#" class="text-white">Like on Facebook</a></li>
                    <li><a href="#" class="text-white">Email me</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div id='divMenu'  class="navbar navbar-dark bg-dark box-shadow" >
            <div class="container d-flex justify-content-between" >
              <a href="vitrine.php" class="navbar-brand d-flex align-items-center">
                <strong>Drogaria SENAC</strong>
              </a>
            </div>
          </div>
      </header>
      <main style="border-bottom:1px solid gray; width: 100%; height:550px">
      <!--<img src='imagens/user.png'>-->
      <!-- <span class="glyphicon glyphicon-user"></span> -->
      <?php
				if (isset($_SESSION['msg'])) {
					echo "<br>".$_SESSION['msg'];
					unset($_SESSION['msg']);
				}else{
          echo("")
        }
			?>
        <div id='divLogin' class="navbar-brand d-flex align-items-center" style ="margin-left: 350px;">
            <form action="Login.php" method ="post" class="formsMinhaConta" id='formLogin'>

                <h3>Acesso ao Painel Administrativo</h3><br><br>

                <label for='txtEmail'>Usuário: </label><br>
                <input class="Infos"id='txtEmailLog' type='text' name='usuario' placeholder="Digite seu e-mail cadastrado..." required><br><br>
                
                <label for='txtSenha'>Senha: </label><br>
                <input class="Infos" id='txtSenha' type="password" name='senha'placeholder="Digite sua senha cadastrada..." minlength='6' maxlength='12' required>

                <br><a href="#"><p>Esqueceu sua senha?</p></a>

                <input type="submit" id="btnEntrar" name="btnEntrar" value="Entrar">
            </form>
        </div>
      </main>
      <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Topo</a>
        </p>
        <p></p>        
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
       
  </body>
</html>
