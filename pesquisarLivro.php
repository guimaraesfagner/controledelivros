<?php
    // Formato do arquivo
header ('Content-type: text/html; charset=utf8');

    //Conectar ao banco de dados
    require('conexao.php');
    include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
    protegePagina();

    mb_internal_encoding('UTF-8');
    $pesquisa = mb_strtoupper($_POST['pesquisa']);  

    if (!$selected) {
        echo 'Erro: Não foi possível conectar a tabela do banco de dados';
       
    } else {
        //SQL para buscar os dados na tabela jogos
        $sql    = "SELECT livros.id, titulo, edicao, id_genero, genero.nome AS genero_nome, id_autor, autor.nome AS autor_nome, id_editora, editora.nome AS editora_nome FROM livros
                   INNER JOIN genero ON livros.id_genero = genero.id
                   INNER JOIN autor ON livros.id_autor = autor.id
                   INNER JOIN editora ON livros.id_editora = editora.id
                   WHERE titulo LIKE '%$pesquisa%' OR edicao LIKE '%$pesquisa%' OR genero.nome LIKE '%$pesquisa%' OR autor.nome LIKE '%$pesquisa%' OR editora.nome LIKE '%$pesquisa%';";

        $result = mysqli_query($con, $sql); // Executa a query
        $n      = mysqli_num_rows($result); // Numero de linhas
    }

    if (!$result){
            // Caso não haja retorno
            echo 'Erro: Ouve algum problema na busca das informações da tabela. Contate o Administrador do sistema';
        } else if ($n<1) {
            // Caso o retorno seja zero
            echo 'Nenhum livro encontrado.';
                      
        } else {
            for ($i = 0; $i < $n; $i++){
                $dados[] = mysqli_fetch_assoc($result);
            }
            echo json_encode($dados, JSON_PRETTY_PRINT);
            
        }



?>