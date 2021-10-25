<?php 
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

    <title>  *-* Drogaria SENAC *-*</title>
    <!-- css reset-->
    <link href="css/reset.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
 
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
          <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
              <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Drogaria SENAC</strong>
              </a>
              <a href="MinhaConta.php" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>Admin</strong>
                  </a>
            </div>
          </div>
      </header>
    
    <main role="main">      
      <section class="jumbotron">
        <div class="container text-center" style="backgrund">
          <h1 class="jumbotron-heading">Drogaria SENAC</h1>
          <p class="lead text-muted">Além de loja física a DrogaBrita também é uma farmácia delivery. Encontre variedades de medicamentos, remédios genéricos, dermocosméticos, itens de cuidado diário, produtos para crianças entre outros . Acesse nossa farmácia online 24 horas e aproveite!.</p>          
        </div>
      </section>
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row" style="height: -200px;">                   
                     <?php                             
                         if(isset($result_Remedios)){
                          if(mysqli_num_rows($result_Remedios)>0){
                              while($rows_remedios=mysqli_fetch_assoc($result_Remedios)){
		                                echo '<div class="col-md-4">';
                                         echo'<div class="card mb-4 box-shadow">';
      		                                   //echo '<td><a href="id='. $rows_remedios["id"].'">'.$rows_remedios["id"].'</a></td>';
      		                                   //echo'<p style="text-align: center;"> Produto :'.$rows_remedios["produto"].'</p>';
      		                                   echo '<img  src="imagens' . $rows_remedios["imagem"] . '" width="150" height="150"   />';
      		                                   
      		                                 // echo'<p style="text-align: center;"> Valor : R$'.$rows_remedios["valor"].'</p>';
                                              echo'<div class="card-body">';
                                                  echo '<div class="d-flex justify-content-between align-items-center">';
                                                      echo '<div class="btn-group">';
                                                         echo '<button type="button" class="btn btn-sm btn-outline-secondary">produto:'.$rows_remedios["produto"] .'</button>';
                                                          echo'<button type="button" class="btn btn-sm btn-outline-secondary">R$ '.$rows_remedios["valor"].',00'.'</button>';
                                                      echo '</div>';
                                                 echo '</div>'; 
                                              echo '</div>';      
                                          echo'</div>';
  		                              echo'</div>';
                                }
                            }else{
                                 echo '<div>';
                                 echo '<p>Nenhum registro encontrado.</p>';
                                 echo '</div>';
                            }
                                mysqli_free_result($result_Remedios);
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
