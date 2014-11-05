<?php    
    session_start();
    if($_GET['limpar']==true){
        session_destroy();
        session_start();
    }
    include_once "util/conexao.php";
    
?>
<?php
            if($_POST['gravar']){
                $erro=false;
                if(empty($_POST['Nome'])){
                    $erros[] = 'Nome';
                    $erro=true;
                }    
                if($erro){
                    echo ' OPS! Você deve informar o código: '.implode(', ',$erros);
                }else{
                      $_sql = "INSERT INTO produto (nome,valor,cat_codigo,uni_codigo) VALUES ('%s','%s','%s','%s')";
                      $_sql = sprintf($_sql,$_POST['Nome'],$_POST['Valor'],$_POST['Categoria'],$_POST['Unidade']);                  
                    //$_sql = mysql_query("INSERT INTO pessoa (nome) VALUES (\"$nome\")") or die(mysql_error());
                    if(mysql_query($_sql)){
                        echo 'Sucesso! Produto cadastrado.';
                    }else{
                        echo 'Erro ao cadastrar a Produto.'.$_sql;
                    }                  
                }
            }
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
    <h2>Cadastro de Produtos</h2>
    <form method="post">            
        <div class="fieldContainer">
            <div class="formRow">
                <div class="label">                                    
                    <label for="nome">Nome:</label>
                </div>
                        
                <div class="field">
                    <input type="text" name="nome" id="nome" />
                </div>            
             </div>
             <div class="formRow">   
                <div class="label">                                    
                    <label for="nome">Categoria:</label>
                    </div>    
                    <div class="field">
                        <select name="Categoria">
                        <?php
                            $_sql = "select * from categoria";
                            $_retorno = mysql_query($_sql);
                            while($_linha = mysql_fetch_object($_retorno)){
                                echo  "<option value=\"{$_linha->cat_codigo}\">{$_linha->descricao}</option>";
                            }
                            
                        ?>                                            
                        </select> 
                    </div>
                </div>
             <div class="formRow">       
                <div class="label">                                    
                    <label for="nome">Unidade:</label>                
                </div>    
                <div class="field">
                    <select name="Unidade">
                        <?php
                            $_sql = "select * from unidade_medida";
                            $_retorno = mysql_query($_sql);
                            while($_linha = mysql_fetch_object($_retorno)){
                                echo  "<option value=\"{$_linha->uni_codigo}\">{$_linha->descricao}</option>";
                            }
                            
                        ?>                                            
                        </select>                            
                 </div> 
             </div>    
             <div class="formRow">
                <div class="label">                                    
                    <label for="nome">Valor:</label>
                </div>
                <div class="field">
                    <input type="text" name="valor" id="nome" />
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