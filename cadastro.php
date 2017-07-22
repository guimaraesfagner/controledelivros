<?php
header ('Content-type: text/html; charset=utf8');

include("conexao.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
//protegePagina(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />

		

	<!--Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">

	<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />

	<!--jQuery-->
		<script language="JavaScript" src="js/jquery-3.2.1.js" type="text/javascript"></script>
		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>

	<!--Script-->
		<script src="js/script.js" type="text/javascript"></script>

		
	
	<title>Controle de Livros</title>
</head>	

<body>
	<section>
		<h1>Cadastro de Livros</h1>
		<nav><a href="index.php">Listar todos</a></nav>
		<!-- Div -->
		<div class="col-sm-6">
				
				<br /><br />

				<form class="form-horizontal" action="cadastrarLivro.php" method="post" name="formLivro">
				<div class="form-group">
					<label class="col-sm-2">Titulo</label>
					<input class="col-sm-6" type="text" name="titulo" id="titulo"/>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Edição</label>
					<input class="col-sm-4" type="text" name="edicao" id="edicao"/>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Genero</label>
					<select name="genero" id="genero" onchange="addNovoGenero()"/>
					<option id="generoVazio" value="generoVazio" selected>Escolha um Genero</option>
					<option id="novoGenero" value="novoGenero">Adicionar novo Genero</option>

					<?php
						$querygenero = "select * from genero";
						$sqlgenero = mysqli_query($con, $querygenero);
						
						while($dadosgenero = mysqli_fetch_array($sqlgenero)){
						
						echo "<option value='" . $dadosgenero['id'] . "' ";
						echo ">" . $dadosgenero['id'] . " - " . $dadosgenero['nome'] . "</option> \n";
						} 
					?>
					</select>
				</div>
				<div class="form-group" id="divNovoGenero" >
					<label class="col-sm-2">Genero</label>
					<input type="text" name="cadastrarNovoGenero" id="cadastrarNovoGenero" value=""/>
					
					<input class="btn btn-default" type="button" onclick="cancelarNovoGenero()" name="cancelar" value="Cancelar" />
				</div>



				<div class="form-group">
					<label class="col-sm-2">Autor</label>
					<select name="autor" id="autor" onchange="addNovoAutor()"/>
					<option id="autorVazio" value="autorVazio" selected>Escolha um Autor</option>
					<option id="novoAutor" value="novoAutor">Adicionar novo Autor</option>

					<?php
						$queryautor = "select * from autor";
						$sqlautor = mysqli_query($con, $queryautor);
						
						while($dadosautor = mysqli_fetch_array($sqlautor)){
						
						echo "<option value='" . $dadosautor['id'] . "' ";
						echo ">" . $dadosautor['id'] . " - " . $dadosautor['nome'] . "</option> \n";
						} 
					?>
					</select>
				</div>
				<div class="form-group" id="divNovoAutor" >
					<label class="col-sm-2">Autor</label>
					<input type="text" name="cadastrarNovoAutor" id="cadastrarNovoAutor" value=""/>
					
					<input class="btn btn-default" type="button" onclick="cancelarNovoAutor()" name="cancelar" value="Cancelar" />
				</div>
				<div class="form-group">
					<label class="col-sm-2">Editora</label>
					<select name="editora" id="editora" onchange="addNovaEditora()"/>
					<option id="editoraVazio" value="editoraVazia" selected>Escolha uma editora</option>
					<option id="novaEditora" value="novaEditora">Adicionar nova Editora</option>
					<?php
						$queryeditora = "select * from editora";
						$sqleditora = mysqli_query($con, $queryeditora);
						
						while($dadoseditora = mysqli_fetch_array($sqleditora)){
						
						echo "<option value='" . $dadoseditora['id'] . "' ";
						echo ">" . $dadoseditora['id'] . " - " . $dadoseditora['nome'] . "</option> \n";
						} 
					?>
					</select>
					
				</div>
				<div class="form-group" id="divNovaEditora" >
					<label class="col-sm-2">Editora</label>
					<input type="text" name="cadastrarNovaEditora" id="cadastrarNovaEditora" value=""/>
					
					<input class="btn btn-default" type="button" onclick="cancelarNovaEditora()" name="cancelar" value="Cancelar" />
				</div>
				
				<input class="btn btn-default" type="submit" value="Salvar" name="salvar" onclick="return validaCampos()"/>
				<input class="btn btn-default" type="reset" name="Limpar" value="limpar" />
				
			</form>

		</div>
	</section>

















</body>
</html>
