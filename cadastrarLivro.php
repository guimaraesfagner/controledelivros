<?php
header ('Content-type: text/html; charset=utf8');

	//Carregar banco de dados
	require ('conexao.php');
	include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina(); 

		//Variaveis que recebem os dados do formulário
		mb_internal_encoding('UTF-8');
		$id;
		$titulo = mb_strtoupper($_POST["titulo"]);
		$edicao = mb_strtoupper($_POST["edicao"]);
		$genero = mb_strtoupper($_POST["genero"]);
		$autor = mb_strtoupper($_POST["autor"]);
		$editora = mb_strtoupper($_POST["editora"]);
		$novoGenero  = mb_strtoupper($_POST['cadastrarNovoGenero']);
		$novoAutor   = mb_strtoupper($_POST['cadastrarNovoAutor']);
		$novaEditora = mb_strtoupper($_POST['cadastrarNovaEditora']);
		$seAlterou = FALSE;

		if (!$selected){
			echo "Erro ao conectar com o banco de dados";
		} else {
			
			$query_start = "START TRANSACTION;";
			$sql_start = mysqli_query($con, $query_start);
			$sql = "insert into livros (titulo, edicao) values ('$titulo', '$edicao');";
			$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			$id = mysqli_insert_id($con);
			$seAlterou = TRUE;
			if (!$result){
					echo "Erro ao executar a alteração no livro selecionado - Campo 'Titulo e/ou Ediçao'";
			$seAlterou = FALSE;
			} 

			/*

			$query_genero = "insert into genero (nome) values ('$genero');";
			$sql_genero = mysqli_query($con, $query_genero) or die("Não foi possível cadastrar o Genero.");
			$id_genero = mysqli_insert_id($con);
			$query_autor = "insert into autor (nome) values ('$autor');";
			$sql_autor = mysqli_query($con, $query_autor) or die("Não foi possível cadastrar o Autor.");
			$id_autor = mysqli_insert_id($con);
			$query_editora = "insert into editora (nome) values ('$editora');";
			$sql_editora = mysqli_query($con, $query_editora) or die("Não foi possível cadastrar a editora.");
			$id_editora = mysqli_insert_id($con);
			$sql = "insert into livros (titulo, edicao, id_genero, id_autor, id_editora) values ('$titulo', '$edicao', '$id_genero', '$id_autor', '$id_editora');";

			*/
}
		//Se campo novo genero não estiver vazio, criar novo genero
		if(!empty($novoGenero)) {
			$query_genero = "insert into genero (nome) values ('$novoGenero')";
			$sql_genero = mysqli_query($con, $query_genero) or die("Não foi possível cadastrar o Genero.");
			$novogeneroid = mysqli_insert_id($con); 
			
			$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_genero = '$novogeneroid' where id=$id";
			$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			$seAlterou = TRUE;
				if (!$result){
					echo "Erro ao executar a alteração no livro selecionado - Campo 'Gênero'";
				$seAlterou = FALSE;
				} 
		} else { // Se estiver vazio, pegar valor do option e fazer update
				$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_genero = '$genero' where id=$id";
				$result = mysqli_query($con, $sql) or die (mysqli_error($con));
				$seAlterou = TRUE;
				if (!$result){
				echo "Erro ao executar a alteração no livro selecionado - Campo 'Gênero'";
				$seAlterou = FALSE;
				} 
				
		}
			
		//Se campo novo autor não estiver vazio, criar novo autor
		if(!empty($novoAutor)) {
			$query_autor = "insert into autor (nome) values ('$novoAutor')";
			$sql_autor = mysqli_query($con, $query_autor) or die("Não foi possível cadastrar o autor.");
			$novoautorid = mysqli_insert_id($con); 
			
			$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_autor = '$novoautorid' where id=$id";
			$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			$seAlterou = TRUE;
				if (!$result){
					echo "Erro ao executar a alteração no livro selecionado - Campo 'Autor'";
					$seAlterou = TRUE;
				} 
		} else { // Se estiver vazio, pegar valor do option e fazer update
				$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_autor = '$autor' where id=$id";
				$result = mysqli_query($con, $sql) or die (mysqli_error($con));
				$seAlterou = TRUE;
				if (!$result){
				echo "Erro ao executar a alteração no livro selecionado - Campo 'Autor'";
				$seAlterou = FALSE;
				} 
				
		}
		
		if(!empty($novaEditora)) {
			$query_editora = "insert into editora (nome) values ('$novaEditora')";
			$sql_editora = mysqli_query($con, $query_editora) or die("Não foi possível cadastrar o editora.");
			$novaeditoraid = mysqli_insert_id($con); 
			
			$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_editora = '$novaeditoraid' where id=$id";
			$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			$seAlterou = TRUE;
				if (!$result){
					echo "Erro ao executar a alteração no livro selecionado - Campo 'Editora'";
					$seAlterou = FALSE;
				} 
		} else { // Se estiver vazio, pegar valor do option e fazer update
				$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_editora = '$editora' where id=$id";
				$result = mysqli_query($con, $sql) or die (mysqli_error($con));
				$seAlterou = TRUE;
				if (!$result){
				echo "Erro ao executar a alteração no livro selecionado - Campo 'Editora'";
				$seAlterou = FALSE;
				} 
				
		}

		if($seAlterou == TRUE){

			echo '<script>if(confirm (" Livro cadastrado com sucesso.\nDeseja cadastrar mais algum livro?")){
				    	  	location.href="cadastro.php";
	
							} else {

							location.href="index.php";
	
						  }
			  	  </script>';

			} else {

				echo "<script>alert('Erro ao tentar alterar o livro. Por favor, contate o administrador!');
					  window.location='index.php';
			  </script>";
			}

			
			$query_commit = "COMMIT;";
			$sql_commit = mysqli_query($con, $query_commit);
			$result = mysqli_query($con, $sql) or die("Não foi possível inserir o novo livro no sistema.");
			if(!$result) {
				echo "Não foi possivel cadastrar o novo livro";
			} else {
			echo "Livro cadastrado com sucesso";
			echo "<br />";
			echo "<a href='cadastro.php'>Voltar para cadastro</a>";
			echo "<br />";
			echo "<a href='index.php'>Listar todos</a>";

		}

?>