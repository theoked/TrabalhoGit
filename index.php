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
<!--<script type="text/javascript" src="js/html5shiv.js"></script>-->
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<?php
    include("core/menu.php");
?>
<div id="carbonForm">
	<h1>Login</h1>

    <form action="submit.php" method="post" id="signupForm">

    
    <div class="fieldContainer">        
        <div class="formRow">
            <div class="label">
                <label for="email">Email:</label>
            </div>
            
            <div class="field">
                <input type="text" name="email" id="email" value="stelio@ked.com.br" />
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <label for="pass">Password:</label>
            </div>
            
            <div class="field">
                <input type="password" name="pass" id="pass" />
            </div>
        </div>
        
        
    </div> <!-- Closing fieldContainer -->
    
   <div class="signupButton">
        <input type="submit" name="submit" id="submit" value="Signup" />
    </div>    
    </form>
        
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<?include("core/footer.php"); ?>

</body>
</html>