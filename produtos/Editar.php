   
<?php
 
    require '../include/conectar.php';
    
 
    $id = 0;
    $produto = '';
    $valor = '';
    
 
    if (!empty($_GET)){
         
        $id = $_GET["id"];
         //echo $id;
        $sql = 'select id, produto, valor from remedios';
       // echo($sql);
        
                        
        $result = mysqli_query($connection, $sql);
         
        while ($remedios = mysqli_fetch_assoc($result)){
            $produto = $remedios["produto"];
            $valor = $remedios["valor"];
            
        }

        mysqli_free_result($result);
         
        mysqli_close($connection);
       // header('Location: pesquisarAdmin.php');
    }
 
?>
 
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <title>Edição de produtos</title>
        <script>  
            window.onload = function(){
                document.querySelector("#btnVoltar").onclick = voltar;
                document.querySelector("#btnAlterar").onclick = validar;
            }
             
            function voltar(){
                document.location = 'pesquisarAdmin.php';
            }
             
            function validar(){
                var msg = "";
                 
                if (document.querySelector("#txtNome").value == ""){
                   msg = "Produto:\n";
                } 
                if(document.querySelector("#txtValor").value==""){
                    msg="Valor:\n";
                } 
                if (msg=="") { 
                     alert("Produto alterado com sucesso!");         
                 }
            }         
            
        </script>
    </head>

    <body>
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
                  <div class="navbar navbar-dark bg-dark box-shadow">
                    <div class="container d-flex justify-content-between">
                      <a href="#" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                        <strong>Admin</strong>
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </div>
            </header>
            <main role="main">      
                 <section class="jumbotron">
                    <div class="container text-center">
                        <h1 class="jumbotron-heading">Edição de produtos</h1>         
                    </div>
              </section>
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row" style="height: -200px;">
                            
                            <form style="margin-left: 450px;" action="alterar.php" method="post">
                                <input type="hidden" name="hddId" value="<?php echo $id?>"><br><br>
                                <label>Produto:</label><br><br>
                                <input type="text" id="txtNome" name="txtNome" required value="<?php echo $produto?>"><br><br>
                                <label>Valor:</label><br><br>
                                <input id="txtValor" type="text" name="txtValor" required  value="<?php echo $valor?>"><br><br>
                                <button id= 'btnAlterar' type= 'submit' onclick="Alert()">Alterar</button>
                                <input type="button" id="btnVoltar" value="Voltar">
                            </form>
                        </div>
                    </div>
                </div>
            <footer class="text-muted">
                <div class="container">
                    <p class="float-right">
                        <a href="#">Topo</a>
                   </p>
                  <p>Album example is &copy; Bootstrap, customizado por Geremias Pereira!</p>        
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
</body>

</html>