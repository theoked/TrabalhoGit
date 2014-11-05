<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trabalho T.A</title>
<script type="text/javascript" src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<?php
    include("core/menu.php");
    include_once("util/conexao.php");  
          
    if(!$_POST['nome'] || strlen($_POST['nome'])<3 || strlen($_POST['nome'])>50){
        $errors['name']='Por favor, preencha um nome de cidade válido! <br /> Devem ter entre 3 e 50 caracteres.';
    }else{
        $_sql = "INSERT INTO cidade (est_sigla,nome) VALUES ('%s','%s')";
        $_sql = sprintf($_sql,$_POST['UF'],$_POST['nome']);                  
        //$_sql = mysql_query("INSERT INTO pessoa (nome) VALUES (\"$nome\")") or die(mysql_error());
        if(mysql_query($_sql)){
            echo 'Sucesso! Cidade cadastrada.';
            ?>
            <a href="cidadeLista.php">Voltar</a>
            <?php 
        }else{
            echo 'Erro ao cadastrar a Cidade.';
        }                  
    }        
?>
    </div>
</div>

</body>
</html>