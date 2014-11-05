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
                $_sql = "SELECT count(*) as quantidade from produto";
                $_retorno = mysql_query($_sql);                
                $_quant = mysql_fetch_object($_retorno);            
?>
            
            <div id="carbonForm2">
    <h2>Cadastro de Cidade</h2>

    <form method="post">

    <div class="fieldContainer">
        <div class="formRow"> 
        <p><span class="posted">Lista de Produtos <a href="produtoCadastro.php">Cadastrar Novo Produto</span>         
         </div>
         <table border="0" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#C0C0FF" style="font-size: 14px;">                
                <th align="left">Nome</th>
                <th align="left">Categoria</th>
                <th align="right">Valor</th>
                <th colspan="2">Ação</th>
            </tr>
            <?php
                $pg = $_GET["p"];
                $numreg = 20; // Quantos registros por página vai ser mostrado
                if (!isset($pg)) {
                        $pg = 0;
                }
                $inicial = $pg * $numreg;
                // Faz o Select pegando o registro inicial até a quantidade de registros para página
                $sql = mysql_query("SELECT pr.pro_codigo, pr.nome, pr.valor, um.sigla, ct.descricao
                                   FROM produto pr, unidade_medida um, categoria ct 
                                  WHERE pr.uni_codigo = um.uni_codigo 
                                    AND pr.cat_codigo = ct.cat_codigo                          
                                  ORDER BY nome 
                                  LIMIT $inicial, $numreg");
                                  

                // Serve para contar quantos registros você tem na seua tabela para fazer a paginação
                $sql_conta = mysql_query("SELECT pr.pro_codigo, pr.nome, pr.valor, um.sigla, ct.descricao
                                   FROM produto pr, unidade_medida um, categoria ct 
                                  WHERE pr.uni_codigo = um.uni_codigo 
                                    AND pr.cat_codigo = ct.cat_codigo                          
                                  ORDER BY nome");
                
                $quantreg = mysql_num_rows($sql_conta); // Quantidade de registros pra paginação
                
                include("produtoPaginacao.php"); // Chama o arquivo que monta a paginação. ex: << anterior 1 2 3 4 5 próximo >>
                
                echo "<br><br>"; // Vai servir só para dar uma linha de espaço entre a paginação e o conteúdo       
                while ($_linha = mysql_fetch_object($sql)) {
                    echo "<tr>                        
                                <td>$_linha->nome - $_linha->sigla</td>
                                <td>$_linha->descricao</td>
                                <td align=\"right\">R$ {$_linha->valor}</td>
                                <td align=\"right\"><a href=\"?pg=produtoAlterar&pro_codigo={$_linha->pro_codigo}\"><img src=\"img/edit1.ico\" alt=\"Alterar\" title=\"Alterar\"></a></td>
                                <td align=\"left\"><a href=\"?pg=produtoExcluir&pro_codigo={$_linha->pro_codigo}\"><img src=\"img/Sair.ico\" alt=\"Excluir\" title=\"Excluir\"></a></td> 
                              </tr>
                              <tr><td class=\"posLinha\"  colspan=\"5\"></td></tr>
                              ";            
                        /* Ai o resto é com voces em montar como deve parecer o conteúdo */
                }
        ?>
        </table>
    </div>
    <!-- end #content -->
    <?php include "pg/sidebar.php";?>       
    </div>
</div>