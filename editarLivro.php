<?php
header ('Content-type: text/html; charset=utf8');
	require('conexao.php');
	include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
    protegePagina(); 


	$id          = $_POST['id'];
	$titulo      = $_POST['titulo'];
	$edicao      = $_POST['edicao'];
	$genero      = $_POST['genero']; 
	$autor       = $_POST['autor'];
	$editora     = $_POST['editora'];
	$novoGenero  = $_POST['cadastrarNovoGenero'];
	$novoAutor   = $_POST['cadastrarNovoAutor'];
	$novaEditora = $_POST['cadastrarNovaEditora'];
	$seAlterou = FALSE;


	if(!$selected){
		echo "erro ao conectar ao banco de dados "; 
	} else {
		$sql = "update livros set titulo = '$titulo', edicao = '$edicao' where id=$id";
		$result = mysqli_query($con, $sql) or die (mysqli_error($con));
		$seAlterou = TRUE;
			if (!$result){
					echo "Erro ao executar a alteração no livro selecionado - Campo 'Titulo e/ou Ediçao'";
			$seAlterou = FALSE;
			} 
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

			echo "<script>alert('Livro editado com sucesso!');
					  window.location='index.php';
			  </script>";

			} else {

				echo "<script>alert('Erro ao tentar alterar o livro. Por favor, contate o administrador!');
					  window.location='index.php';
			  </script>";
			}
		


		

/*
		 
	} elseif (empty($novoAutor) && empty($novaEditora)){

		$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_autor = '$autor', id_editora = '$editora' where id=$id";
		$result = mysqli_query($con, $sql) or die (mysqli_error($con));
		
		if (!$result){
			echo "Erro ao executar a alteração no livro selecionado";
		}

		//header("Location: index.html");
		echo "<script>alert('Livro editado com sucesso!');
					  window.location='index.php';
			  </script>";

		} elseif (!empty($novoAutor) && empty($novaEditora)) {
			$query_autor = "insert into autor (nome) values ('$novoAutor')";
			$sql_autor = mysqli_query($con, $query_autor) or die("Não foi possível cadastrar o autor.");
			echo $query_autor;
			$novoautorid = mysqli_insert_id($con); 
			$sql = "update livros set titulo = '$titulo', edicao = '$edicao',id_autor = '$novoautorid', id_editora = '$editora' where id=$id";
		$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			echo $sql;
		if (!$result){
			echo "Erro ao executar a alteração no livro selecionado";

			} 

		echo "<script>alert('Livro editado com sucesso!');
					  window.location='index.php';
			  </script>";

		} elseif (!empty($novaEditora) && empty($novoAutor)) {
			$query_editora = "insert into editora (nome) values ('$novaEditora')";
			$sql_editora = mysqli_query($con, $query_editora) or die("Não foi possível cadastrar a editora.");
			echo $query_editora;
			$novaeditoraid = mysqli_insert_id($con); 
			$sql = "update livros set titulo = '$titulo', edicao = '$edicao',id_autor = '$autor', id_editora = '$novaeditoraid' where id=$id";
		$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			echo $sql;
		if (!$result){
			echo "Erro ao executar a alteração no livro selecionado";

			} 

		echo "<script>alert('Livro editado com sucesso!');
					  window.location='index.php';
			  </script>";

		} elseif (!empty($novaEditora) && !empty($novoAutor)) {
			echo $novaEditora;
			echo $novoAutor;
			$query_autor = "insert into autor (nome) values ('$novoAutor');";
			$sql_autor = mysqli_query($con, $query_autor) or die("Não foi possível cadastrar o autor.");
			echo $query_autor;
			$novoautorid = mysqli_insert_id($con);
			echo $query_editora;
			$query_editora = "insert into editora (nome) values ('$novaEditora');";
			$sql_editora = mysqli_query($con, $query_editora) or die("Não foi possível cadastrar a editora.");
			echo $query_editora;
			$novaeditoraid = mysqli_insert_id($con); 
			
			$sql = "update livros set titulo = '$titulo', edicao = '$edicao', id_autor = '$novoautorid', id_editora = '$novaeditoraid' where id=$id;";
				echo $sql;
		$result = mysqli_query($con, $sql) or die (mysqli_error($con));
			echo $sql;
		if (!$result){
			echo "Erro ao executar a alteração no livro selecionado";

			} 

		echo "<script>alert('Livro editado com sucesso!');
					  window.location='index.php';
			  </script>";

		} 

		

		else {

		}   echo "<script>alert('Erro ao tentar alterar o livro. Por favor, contate o administrador!');
					  window.location='index.php';
			  </script>";    

*/		

	

?>