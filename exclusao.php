
<?php
	require('conexao.php');
	include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina(); 


	$id = $_GET['id'];

	if (!$selected){
		echo "Não foi possível conectar ao banco de dados";
	} else {
			$sql = "delete from livros where id = $id";
			$result = mysqli_query($con, $sql) or die ("Não foi possível excluir o Livro");
			if (!$result){
				echo "Não foi possivel excluir o Livro selecionado";
			} else {
				echo "<script>alert('Excluido com sucesso!');
							  window.location='index.php';
					  </script>";
			}
		   }
?>