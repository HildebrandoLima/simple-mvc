<?php

require_once 'Models/Produto.php';
require_once 'Models/Funcoes.php';

$objFcn = new Produto();
$objFcs = new Funcoes();

if(isset($_POST['btCadastrar'])){
    if($objFcn->queryInsert($_POST) == 'ok'){
        header('location: /PHP-com-MVC/	Criar-Conta');
    }else{
        echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Formulário de cadastro </title>
</head>
<body>

	<h1> Criar Conta </h1>
	<a href="Index"> Index </a>
	<a href="Sobre"> Sobre </a>
	<a href="Contato"> Contato </a><br /><br />

    <form name="formCad" action="" method="POST">
        <p><input type="text" name="nome" placeholder="Nome" required="required" value="<?=$objFcs->trataCaracter((isset($func['nome']))?($func['nome']):(''), 2)?>"></p>
        <p><input type="text" name="produto" placeholder="R$ Valor" required="required" onKeyPress="return(MascaraMoeda(this,'.',',',event))"></p>
        <p><input type="text" name="descricao" placeholder="Descrição" required="required" value="<?=$objFcs->trataCaracter((isset($func['descricao']))?($func['descricao']):(''), 2)?>"></p>
        <p><input type="text" name="imagem" placeholder="imagem" required="required" value="<?=$objFcs->trataCaracter((isset($func['imagem']))?($func['imagem']):(''), 2)?>"></p>
        <p><input type="submit" name="<?=(isset($_GET['acao']) == 'edit')?('btAlterar'):('btCadastrar')?>" value="<?=(isset($_GET['acao']) == 'edit')?('Alterar'):('Cadastrar')?>"></p>
        <input type="hidden" name="func" value="<?=(isset($func['id_produto']))?($objFcs->base64($func['id_produto'], 1)):('')?>">
    </form>

	<!-- Mascará da Moeda -->
	<script language="javascript">
	 function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){  
		 var sep = 0;  
		 var key = '';  
		 var i = j = 0;  
		 var len = len2 = 0;  
		 var strCheck = '0123456789';  
		 var aux = aux2 = '';  
		 var whichCode = (window.Event) ? e.which : e.keyCode;  
		 if (whichCode == 13 || whichCode == 8) return true;  
		 key = String.fromCharCode(whichCode); // Valor para o código da Chave  
		 if (strCheck.indexOf(key) == -1) return false; // Chave inválida  
		 len = objTextBox.value.length;  
		 for(i = 0; i < len; i++)  
			 if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;  
		 aux = '';  
		 for(; i < len; i++)  
			 if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);  
		 aux += key;  
		 len = aux.length;  
		 if (len == 0) objTextBox.value = '';  
		 if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;  
		 if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;  
		 if (len > 2) {  
			 aux2 = '';  
			 for (j = 0, i = len - 3; i >= 0; i--) {  
				 if (j == 3) {  
					 aux2 += SeparadorMilesimo;  
					 j = 0;  
				 }  
				 aux2 += aux.charAt(i);  
				 j++;  
			 }  
			 objTextBox.value = '';  
			 len2 = aux2.length;  
			 for (i = len2 - 1; i >= 0; i--)  
			 objTextBox.value += aux2.charAt(i);  
			 objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);  
		 }  
		 return false;  
	 }  
	</script>
</body>
</html>