<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />

	<!--Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">		

	<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />

	<!--jQuery-->
		<script language="JavaScript" src="js/jquery-3.2.1.js" type="text/javascript"></script>

	<!--Script-->
		<script src="js/script.js" type="text/javascript"></script>

		
	
	<title>Controle de Livros</title>
</head>	

<body>
	<section>
	<h3><?php echo "Seja bem vindo ", $_SESSION['usuarioNome'], ". <a href='logoff.php'>Clique aqui</a> para sair"; ?></h3>
		<h1>Controle de Livros</h1>
		<!-- Carregando -->
		<h2></h2>
		<nav><a href="cadastro.php">Cadastrar novo Livro</a> - 
			 <form class="form-vertical" method="post" name="formPesquisar">
				 <input type="text" id="txtPesquisar" name="txtPesquisar"/>
				 <input type="button" value="Pesquisar" name="btnPesquisar" id="btnPesquisar">
			 </form> 


		</nav>
		<!-- Tabela -->
		<div class="container row col-md-8">		
		<table id="tabelaDeLivros" class="table table-condensed">
			<caption></caption>
				<thead>
					<th>ID</th>
					<th>Titulo</th>
					<th>Edição</th>
					<th>Gênero</th>
					<th>Autor</th>
					<th>Editora</th>
					<th>Editar</th>
					<th>Excluir</th>
				</thead>
			<tbody></tbody>
		</table>
		<h5></h5>
		</div>
	</section>

</body>
</html>