<!DOCTYPE html>
<?php
	require '../include/conectar.php';
	
	if(!empty($_POST)){
		$produto=$_POST['txtNome'];
		$valor= $_POST['txtValor'];
		$img = $_FILES['fotoProduto'];
	
		//var_dump($img);

		print_r($_FILES);
		if(isset($_FILES['fotoProduto'])){
			$nomeImg = time().'jpeg';
			var_dump($nomeImg);
			$diretorioImg='imagens'.$nomeImg;
			move_uploaded_file($img['tmp_name'], $diretorioImg);

		}else{
			echo'erro ao carregar a imagem!!';exit;
		}
		$sql="INSERT INTO remedios(imagem, produto, valor ) VALUES ('$nomeImg','$produto','$valor')";

		//echo($sql);

		//exit;
		
		$result=mysqli_query($connection,$sql);
		
		//$id=mysqli_insert_id($connection);
		//echo ($id);
		
		mysqli_close($connection);
		header('Location: pesquisarAdmin.php');
	}

?>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de  Remédios</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../../../favicon.ico">

    	<title>  *-* Drogaria SENAC *-*</title>

	</head>
	<body>
		<header >
			      <div class="collapse bg-dark" id="navbarHeader" >
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
		          		<h1 class="jumbotron-heading">Cadastro de Produtos</h1>         
		        	</div>
		      </section>
		      	<div class="album py-5 bg-light">
		      		<div class="container">
		      			<div class="row" style="height: -200px;">
							
						  <form style=" margin-left: 450px;  " action="cadastroProdutos.php" method="post" enctype="multipart/form-data">
								<label>Produto</label><br>
								<input id="Nome" type="text" name="txtNome"required><br>
								<label>Valor</label><br>
								<input id="valor" type="text" name="txtValor"required><br><br>
								<input type="file" name="fotoProduto" id ='fotoProduto'onchange='previaImagem()' required><br><br>
								<img style="width: 150px; height: 150px;"><br><br>
								<input id="btn" type="submit" value="incluir">
								
							</form>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

							<script type="text/javascript">
									document.querySelector("btn")=validar;
									function previaImagem(){
										let imagem = document.querySelector('#fotoProduto').files[0];

										let previa=document.querySelector('img');

										let reader = new FileReader();

										reader.onloadend = function (){

											previa.src=reader.result;
										}
										if (imagem){
											reader.readAsDataURL(imagem);
										}else{

											previa.src='';
										}

									}
									function validar(){
										var msg="";
										if(msg.document.querySelector("#Nome").value==""){
											msg="produto\n";
										}
										if(msg.document.querySelector("#valor").value==""){
											msg="valor";
										}

									}

							</script>
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