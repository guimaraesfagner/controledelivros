<?php

// Arquivo de segurança
require_once("seguranca.php");

// Testa envio do form de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Salva usuario e senha e testa com isset() para ter certeza que o campo foi preenchido
   $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
  $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

  // Validação em seguranca.php
  if (validaUsuario($usuario, $senha) == true) {
    // se usuario for válido, carrega index.php
    header("Location: index.php");
  } else {
    // Se usuário invalido, emite alerta e volta para a pagina de login
   echo "<script>alert('Usuário e/ou senha incorretos. Tente novamente.');
        //        window.location='login.php';
            </script>";
    
   //expulsaVisitante();
  }
}