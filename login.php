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

	<!--Script-->
		<script src="js/script.js" type="text/javascript"></script>

		
	
	<title>Controle de Livros</title>
</head>
<body>
<section>
	<h1>Controle de Livros</h1>
	
	<div class="col-sm-6">
		<form class="form-horizontal" method="post" action="valida.php">
		  <div class="form-group">
		  <label class="control-label col-sm-2">Usuário</label>
		  <input class="col-sm-4" type="text" name="usuario" maxlength="50" />
		  </div>
		  <div class="form-group">
		  <label class="control-label col-sm-2">Senha</label>
		  <input class="col-sm-4" type="password" name="senha" maxlength="50" />
		  </div>
		  <div class="col-sm-2"></div>
		  <input class="btn btn-default" type="submit" value="Entrar" />
		</form>
</div>
</section>
</body>	
</html>