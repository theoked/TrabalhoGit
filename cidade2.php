<?php
include("util/conexao.php");
// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// This is the URL your users are redirected,
// when registered succesfully:

$redirectURL = 'cidadeLista.php';

$errors = array();

// Checking the input data and adding potential errors to the $errors array:
alert('entrou');

if(!$_POST['nome'] || strlen($_POST['nome'])<3 || strlen($_POST['nome'])>50)
{
	$errors['nome']='Por favor, preencha um nome válido! <br /> Devem ter entre 3 e 50 caracteres.';
}

// Verificar se o pedido foi enviado via AJAX

if($_POST['ajax_form'])
{
    alert('entrou');
	if(count($errors)){
		$errString = array();
		foreach($errors as $k=>$v)
		{
			// The name of the field that caused the error, and the
			// error text are grouped as key/value pair for the JSON response:
			$errString[]='"'.$k.'":"'.$v.'"';
		}
		
		// JSON error response:
		die	('{"status":0,'.join(',',$errString).'}');
	}
	
    $_sql = "INSERT INTO cidade (est_sigla,nome) VALUES ('%s','%s')";
    $_sql = sprintf($_sql,$_POST['UF'],$_POST['nome']);                      
    if(mysql_query($_sql)){
        Alert( 'Sucesso! Cidade cadastrada.');
    }else{
        echo 'Erro ao cadastrar a Cidade.';
    }                  
	// JSON resposta sucesso. Retorna a URL de redirecionamento:
	echo '{"status":1,"redirectURL":"'.$redirectURL.'"}';

	exit;
}

// If the request was not sent via AJAX (probably JavaScript
// has been disabled in the visitors' browser):

if(count($errors))
{
	echo '<h2>'.join('<br /><br />',$errors).'</h2>';
	exit;
}

// Directly redirecting the visitor:

header("Location: ".$redirectURL);
?>