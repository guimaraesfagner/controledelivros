/**
* Captura dos itens do banco de dados
*/

//Função somente para testes 
/**
function teste(){
alert("Testando");
} 
*/

function enterPesquisa() {
	campoSelecionado = document.getElementById("txtPesquisar").selected;
	if (event.keycode == 13 && campoSelecionado){


	}
}

function validaCampos(){

	campotitulo    = document.getElementById("titulo").value; 
	campoedicao    = document.getElementById("edicao").value;
	
	campoautor     = formLivro.cadastrarNovoAutor.value;
	campoeditora   = formLivro.cadastrarNovaEditora.value;
	campogenero    = formLivro.cadastrarNovoGenero.value;

	autorvisivel   = document.getElementById("divNovoAutor").style.visibility;
	editoravisivel = document.getElementById("divNovaEditora").style.visibility;
	generovisivel  = document.getElementById("divNovoGenero").style.visibility;

	generovazio    = formLivro.genero.value;
	autorvazio     = formLivro.autor.value;
	editoravazia   = formLivro.editora.value;

	

	//Testar se os campos de texto estão vazios e visivéis

	if (campoautor == "" && autorvisivel == "visible") {
		alert('Preencha ou cancele o campo Autor');
		formLivro.cadastrarNovoAutor.focus();
		return false;
	
	} else if (campoeditora == "" && editoravisivel == "visible"){
		alert('Preencha ou cancele o campo Editora');
		formLivro.cadastrarNovaEditora.focus();
		return false;
	
	}  else if (campogenero == "" && generovisivel == "visible") {
		alert('Preencha ou cancele o campo Genero');
		formLivro.cadastrarNovoGenero.focus();
		return false;

	} else if (campotitulo == ""){
		alert('Campo titulo em branco');
		formLivro.titulo.focus();
		return false;

	}  else if (campoedicao == ""){
		alert('Campo edicao em branco');
		formLivro.edicao.focus();
		return false;

	} else if (generovazio == "generoVazio") {
		alert('Escolha uma opção para o Gênero');
		formLivro.genero.focus();
		return false;
	
	}	else if (generovazio == "novoGenero" && campogenero == ""){
			alert('Escolha uma opção para o Gênero');
			formLivro.genero.focus();
			return false;

	} else if (autorvazio == "autorVazio" ) {
		alert('Escolha uma opção para o Autor');
		formLivro.autor.focus();
		return false;
	
	}	else if(autorvazio == "novoAutor" && campoautor == "") {
			alert('Escolha uma opção para o Autor');
			formLivro.autor.focus();
			return false;
		
	} else if(editoravazia == "editoraVazia"){
		alert('Escolha uma opção para a Editora');
		formLivro.editora.focus();
		return false;

	} else if (editoravazia == "novaEditora" && campoeditora == "") {
			alert('Escolha uma opção para a Editora');
			formLivro.editora.focus();
			return false;
	}

}



function addNovoGenero(){
	 var opti = document.getElementById("genero").value;
        if(opti == "novoGenero"){
        	document.getElementById("cadastrarNovoGenero").value='';
            document.getElementById("divNovoGenero").style.visibility ="visible";
        } else {
        	document.getElementById("cadastrarNovoGenero").value='';
        	document.getElementById("divNovoGenero").style.visibility ="hidden";
  
        }
}

function cancelarNovoGenero(){
	document.getElementById("cadastrarNovoGenero").value='';
	document.getElementById("divNovoGenero").style.visibility ="hidden";
	
}

function addNovoAutor(){
	 var option = document.getElementById("autor").value;
        if(option == "novoAutor"){
        	document.getElementById("cadastrarNovoAutor").value='';
            document.getElementById("divNovoAutor").style.visibility ="visible";
        } else {
        	document.getElementById("cadastrarNovoAutor").value='';
        	document.getElementById("divNovoAutor").style.visibility ="hidden";
  
        }
}

function cancelarNovoAutor(){
	document.getElementById("cadastrarNovoAutor").value='';
	document.getElementById("divNovoAutor").style.visibility ="hidden";
	
}

function addNovaEditora(){
	 var opt = document.getElementById("editora").value;
        if(opt == "novaEditora"){
        	document.getElementById("cadastrarNovaEditora").value='';
            document.getElementById("divNovaEditora").style.visibility ="visible";
        } else {
        	document.getElementById("cadastrarNovaEditora").value='';
        	document.getElementById("divNovaEditora").style.visibility ="hidden";
  
        }
}

function cancelarNovaEditora(){
	document.getElementById("cadastrarNovaEditora").value='';
	document.getElementById("divNovaEditora").style.visibility ="hidden";
	
}



/*$(document).ready(function()
{
     $("#preco").maskMoney({
         prefix: "",
         decimal: ".",
         thousands: ""
     });
}); */

function aviso (id){
	if(confirm ('Deseja realmente excluir?')){

		location.href="exclusao.php?id="+id;
	
	} else {

	return false;
	
	}
}
 
/*
function carregarItens(){
	//variaveis
	var itens = "", url = "inicio.php";

	//Capturar dados com AJAX
	$.ajax({
		url: url,
		cache: false,
		dataType: "json",
		beforeSend: function (){
			$("h2").html("Carregando..."); // Carregando...
		},

		error: function() {
			$("h2").html("Existe algum erro com a fonte de dados");
		},

		success: function(resposta) {
		    if(resposta[0].erro){
			    $("h2").html(resposta[0].erro);
		    }
		    else{
			    //Laço para criar linhas da tabela
			    for(var i = 0; i<resposta.length; i++){
				    itens += "<tr>";
				    itens += "<td>" + resposta[i].id + "</td>";
				    itens += "<td>" + resposta[i].titulo + "</td>";
				    itens += "<td>" + resposta[i].edicao + "</td>";
				    itens += "<td>" + resposta[i].autor_nome + "</td>";
				    itens += "<td>" + resposta[i].editora_nome + "</td>";
 				    itens += "<td><a href='edicao.php?id=" + resposta[i].id + "&titulo=" + resposta[i].titulo + "&edicao=" + resposta[i].edicao + "&autor=" + resposta[i].id_autor + "&editora=" + resposta[i].id_editora + "'</a>editar</td>";
				    itens += "<td><a href='javascript:aviso(" + resposta[i].id + ");'>Excluir</a></td>";
				    itens += "</tr>";
			    }
			    //Preencher a Tabela
			    $("#tabelaDeLivros tbody").html(itens);
			    
			    //Limpar Status de Carregando
			  //  $("h2").html(" ");
			    $("h5").html(resposta.length + " Livros carregados com sucesso");
		    }
	    }
    });
}*/



$(document).keypress(function(e) {
		if (e.which == 13) {
			$('#txtPesquisar').submit(function(){
	return false;});
			$('#txtPesquisar').blur();
			$('#btnPesquisar').click();
		}	
	});

$(document).ready(function(){
	

	$("#btnPesquisar").click(function(){
	//variaveis
	var itens = "", vazio = "", url = "pesquisarLivro.php", pesquisa = document.getElementById("txtPesquisar").value;

	
	//Capturar dados com AJAX
	$.ajax({
		url: url,
		type: 'POST',
		cache: false,
		data: {'pesquisa' : pesquisa, },
		dataType: "json",
		beforeSend: function (){
			$("h2").html("Carregando..."); // Carregando...
		},

		error: function() {
			$("h5").html("0 Livros encontrados");
			$("h2").html(" ");
			$("#tabelaDeLivros tbody").html(vazio);
		},

		success: function(resposta) {
		    if(resposta[0].erro){
			    $("h2").html(resposta[0].erro);
		    }
		    else{

			    //Laço para criar linhas da tabela
			    for(var i = 0; i<resposta.length; i++){
				    itens += "<tr>";
				    itens += "<td>" + resposta[i].id + "</td>";
				    itens += "<td>" + resposta[i].titulo + "</td>";
				    itens += "<td>" + resposta[i].edicao + "</td>";
				    itens += "<td>" + resposta[i].genero_nome + "</td>";
				    itens += "<td>" + resposta[i].autor_nome + "</td>";
				    itens += "<td>" + resposta[i].editora_nome + "</td>";
 				    itens += "<td><a href='edicao.php?id=" + resposta[i].id + "&titulo=" + resposta[i].titulo + "&edicao=" + resposta[i].edicao + "&genero=" + resposta[i].id_genero + "&autor=" + resposta[i].id_autor + "&editora=" + resposta[i].id_editora + "'</a>Editar</td>";
				    itens += "<td><a href='javascript:aviso(" + resposta[i].id + ");'>Excluir</a></td>";
				    itens += "</tr>";
			    }
			    //Preencher a Tabela
			    $("#tabelaDeLivros tbody").html(itens);
			    
			    //Limpar Status de Carregando
			    $("h2").html(" ");
			    $("h5").html(resposta.length + " Livros encontrados");
		    }
	    }
    });
			$.post(url, function(result) {});
}); 
	$('#btnPesquisar').click();
});