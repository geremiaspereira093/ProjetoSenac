<?php
 
    require 'include/conectar.php';
     
    if (!empty($_POST)){
         
        $produto = $_POST['txtNome'];
 
        $sql = 'select id, produto, valor, imagem  from remedios';
                   
       // echo($sql);
        if ($produto != ''){
            $sql = $sql . " where produto like '%$produto%'";
        }
                  
        $sql = $sql . ' order by produto;';        
             
        $result = mysqli_query($connection, $sql);
 
       // var_dump($result);        
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <title>Pesquisa de remédios</title>
        <script>  
            window.onload = function(){
                document.querySelector("#btnNovo").onclick = novo;
                document.querySelector("#pesq").onclick = validar;
            }
             
            function novo(){
                document.location = 'cadastroProdutos.php';
            }       
            function excluir(id){
                if (window.confirm("Deseja excluir o produto " + id + " ?")){
                    document.location = 'excluir.php?id=' + id;
                }
            }
            function editar(id){
                if (window.confirm("Deseja alterar o produto"+ id + "?")) {
                        document.location= 'Editar.php?id=' + id;
                }
            }
            function validar(){
              var msg="";
				      if (document.querySelector("#txtNome").value == "") {
					    	msg="Nome;\n";
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
            <div class="container text-center">
                <h1 class="jumbotron-heading">Pesquisar Produtos</h1>
            </div><br>
            <form  class="container text-center"  action="pesquisarAdmin.php" method="post">
                <label >Nome:</label>
                <input type="text"id="txtNome" name="txtNome" required>
                <input id="pesq" type="submit" value="Pesquisar">
                <input type="button" id="btnNovo" value="Novo">
            </form>
            <main>
                <div class="album py-5 bg-light">
                    <div class="container">
                         <div class="row" style="height: -200px;">
                            <?php
                                if (isset($result)){ 
                                    if (mysqli_num_rows($result) > 0){
                                        while ($remedios = mysqli_fetch_assoc($result)){
                                            echo '<div class="col-md-4">';
                                                echo '<div class="card mb-4 box-shadow">';
                                              // echo'<p style ="text-align: center;" >Id:'.$remedios["id"].'</p>';
                                                echo '<img style ="text-align: center;" src="imagens' . $remedios["imagem"] . '" width="150" height="150"   />'.'<br>';
                                                 echo'<div class="card-body">';
                                                        echo '<div class="d-flex justify-content-between align-items-center">';
                                                            echo'<div class="btn-group">';
                                                                echo '<p style ="text-align: center;">' . $remedios["produto"] .'&nbsp'. '</p>';
                                                                echo '<p style ="text-align: center;"> R$'. $remedios["valor"].',00'.'&nbsp'.'</p><br>';
                                                                echo'<button><a href="Javascript:editar('. $remedios["id"] .')">Editar</a></button> &nbsp &nbsp ';
                                                                echo '<button><a href="Javascript:excluir(' . $remedios["id"] . ')">Excluir</a></button>';
                                                            echo '</div>';
                                                        echo'</div>';
                                                    echo'</div>';    
                                                echo '</div>';     
                                            echo'</div>';          
                                        }
                                    }else{
                                        echo '<div>';
                                        echo '<td colspan="4">Nenhum registro foi encontrado.</td>';
                                        echo '</div>';
                                    }
                                     
                                    mysqli_free_result($result);
                                     
                                    mysqli_close($connection);
                                }
                            ?>
                        </div>
                    </div>
                </div>           
        </main>
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