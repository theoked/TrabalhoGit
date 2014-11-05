<?php    
    session_start();
    if($_GET['limpar']==true){
        session_destroy();
        session_start();
    }
    include "util/conexao.php";
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trabalho T.A</title>
<script type="text/javascript" src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<script type="text/javascript">
    $(function() {
      if ($.browser.msie && $.browser.version.substr(0,1)<7)
      {
        $('li').has('ul').mouseover(function(){
            $(this).children('ul').show();
            }).mouseout(function(){
            $(this).children('ul').hide();
            })
      }
    });        
</script>

</head>

<body>

<?php
    include("core/menu.php");
?>
<?php
            if($_POST['gravar']){
                $erro=false;
                if(empty($_POST['nome'])){
                    $erros[] = 'Nome:';
                    $erro=true;
                    //echo 'Informe o Nome ';
                }
                if($erro){
                    echo ' OPS! Você deve informar o '.implode(', ',$erros);
                }else{
                      $_sql = "UPDATE cidade SET nome = '{$_POST['nome']}'
                               WHERE cid_codigo='{$_GET['cid_codigo']}'";
                    if(mysql_query($_sql)){
                        echo 'Sucesso! Cadastro de Cidade alterado.';
                    }else{
                        echo 'Erro ao alterar o cadastro da Cidade.';
                    }
                }
            }
         ?>
         <?php
            $_sql = "SELECT * FROM cidade where cid_codigo = '%s'";
            $_sql = sprintf($_sql,$_GET['cid_codigo']);
            $_retorno = mysql_query($_sql);
            $_linha = mysql_fetch_object($_retorno);                        
         ?>

<div id="carbonForm2">
    <h2>Cliente</h2>

    <form action="submit.php" method="post" id="signupForm">

    <div class="fieldContainer">

        <div class="formRow">
            <p class="meta"><span class="posted">Alterar Cidade <a href="?pg=cidadeLista">Voltar</span> </p></a>
            
            <div class="label">
            
                <label for="nome">Sigla:</label>
            </div>
            
            <div class="field">
                <input type="text" name="codigo" id="codigo" value="<?php echo $_linha->est_sigla;?>" />
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <label for="nome">Nome:</label>
            </div>
            
            <div class="field">
                <input type="text" name="nome" id="nome" value="<?php echo $_linha->nome;?>" />
            </div>
        </div>
            
            <tr><td align="center"><input type="submit" name="gravar" value="Alterar">
            <input type="reset" name="limpar" value="Limpar"></td></tr>    
        
    </div> <!-- Closing fieldContainer -->            
        </div>
         
        
        </div>
        <!-- end #content -->        
    </div>
</div>