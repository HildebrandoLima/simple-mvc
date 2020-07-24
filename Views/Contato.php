<h1> Contato </h1>
<a href="Index"> Index </a>
<a href="Sobre"> Sobre </a>

<form method="post" action="">
<p><input type="text" name="name" value="" placeholder="Name..." /></p>
<p><input type="password" name="password" value="" placeholder="Password..." /></p>
<p><input type="email" name="email" value="" placeholder="E-mail..." /></p>
<input type="hidden" name="acao" value="acao">
<p><input type="submit" name="ContactUs" value="ContactUs" /></p>
</form>

<?php
$acao = isset($_POST['acao']) ? trim($_POST['acao']) : '';
    /*condição para criar um regsitro*/
    if(isset($acao) && $acao != "" && $_POST['acao'] == ""){
        require_once('Models/DB.php');
        $Insere = new insert();  
        $Insere->acao = $_POST['acao'];
        if($Insere-> insert()){
            echo  "Cadastrado realizado com sucesso";
        }else{
            echo  "Falha ao cadastrar";
        }
    }
?>
