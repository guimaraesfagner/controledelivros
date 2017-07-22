<?php
header('Content-Type: text/html; charset=utf-8');

$hostname = "localhost";
$username = "root";
$password = ""; // Senha
$dbname   = "banco"; // Nome do banco
// $port = "3306"; // As vezes é necessário, as vezes não.

$con = mysqli_connect($hostname, $username, $password) 
or die ("Não foi possível conectar ao banco de dados mysql");

$selected = mysqli_select_db($con, $dbname)
or die("Não foi possivel conectar a tabela do banco de dados");

mysqli_query($con,"SET NAMES 'utf8'");

mysqli_query($con,'SET character_set_connection=utf8');

mysqli_query($con,'SET character_set_client=utf8');

mysqli_query($con,'SET character_set_results=utf8');
	
?>