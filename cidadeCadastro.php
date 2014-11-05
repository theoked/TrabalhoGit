<?php    
    session_start();
    if($_GET['limpar']==true){
        session_destroy();
        session_start();
    }
    include_once "util/conexao.php";
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trabalho T.A</title>
<script type="text/javascript" src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/meuScript.js"></script>
<script type="text/javascript" src="js/jquery-latest.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
<?php
    include("core/menu.php");
?>
<div id="carbonForm2">
	<h2>Cadastro de Cidade</h2>
    <form id="ajax_form" action="cidade.php" method="post" >
        <div class="fieldContainer">
            <div class="formRow">
                <div class="label">
                    <label for="name">Estado:</label>
                </div>            
                <div class="field">
                    <select name="UF">
                    <?php
                        $_sql = "select * from estado";
                        $_retorno = mysql_query($_sql);
                        while($_linha = mysql_fetch_object($_retorno)){
                            echo  "<option id=\"{$_linha->est_sigla}\" value=\"{$_linha->est_sigla}\">{$_linha->nome}</option>";
                        }                    
                    ?>                                            
                    </select>
                </div>
            </div>        
            <div class="formRow">
                <div class="label">
                    <label for="nome">Nome:</label>
                </div>
                <div class="field">
                    <input type="text" name="nome" id="nome" />
                </div>
            </div>        
        </div> <!-- Closing fieldContainer -->    
        <div class="signupButton">
            <button id="submit" value="Entrar" />
        </div>
    </form>   
    <span id="resultado"></span> 
</div>
<?include("core/footer.php"); ?>

</body>
</html>
