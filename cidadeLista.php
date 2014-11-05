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
    include("util/conexao.php");
?>
<div id="carbonForm2">
    <h2>Cadastro de Cidade</h2>
    <form method="post">
    <div class="fieldContainer">
        <div class="formRow">            
                <h3>Lista de Cidade:</h3>
                    <a href="cidadeCadastro.php">Cadastrar Nova Cidade</a>            
                        <?php
                            $_sql = "SELECT count(*) as quantidade from cidade";
                            $_retorno = mysql_query($_sql);                
                            $_quant = mysql_fetch_object($_retorno);            
                        ?>            
         </div>
         <table border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#C0C0FF" style="font-size: 14px;">
                <th>Código</th>
                <th align="left">Cidade</th>
                <th>Estado</th>
                <th colspan="2">Ação</th>
            </tr>
            <?php
                $pg = $_GET["p"];
                $numreg = 10; // Quantos registros por página vai ser mostrado
                if (!isset($pg)) {
                        $pg = 0;
                }
                $inicial = $pg * $numreg;
                
                $_sql = mysql_query("select c.cid_codigo
                         , c.nome
                         , e.est_sigla
                    from cidade c
                        ,estado e
                    where c.est_sigla = e.est_sigla
                    LIMIT $inicial, $numreg");
                    
                $_sql_conta = mysql_query("select c.cid_codigo
                         , c.nome
                         , e.est_sigla
                    from cidade c
                        ,estado e
                    where c.est_sigla = e.est_sigla");                    
                $quantreg = mysql_num_rows($_sql_conta); // Quantidade de registros pra paginação
                
                include("cidadePaginacao.php"); // Chama o arquivo que monta a paginação. ex: << anterior 1 2 3 4 5 próximo >>                                 
                echo "<br><br>";                
                while ($_linha = mysql_fetch_object($_sql)){
                echo "<tr>
                        <td align=\"center\">{$_linha->cid_codigo}</td>
                        <td>{$_linha->nome}</td>
                        <td align=\"center\">{$_linha->est_sigla}</td>
                        <td align=\"right\"><a href=\"?pg=cidadeAlterar&cid_codigo={$_linha->cid_codigo}\"><img src=\"img/edit1.ico\" alt=\"Alterar\" title=\"Alterar\"></a></td>
                        <td align=\"left\"> <a href=\"?pg=cidadeExcluir&cid_codigo={$_linha->cid_codigo}\"><img src=\"img/Sair.ico\" alt=\"Excluir\" title=\"Excluir\"></a></td>
                      </tr>
                      <tr><td class=\"posLinha\"  colspan=\"7\"></td></tr>";
                }       
        ?>
        </table>
        </div>
    <!-- end #content -->
    </div>
</div>
<?include("core/footer.php"); ?>

</body>
</html>