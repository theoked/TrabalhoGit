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
?>

<div id="carbonForm2">
	<h2>Pedido</h2>

    <form action="submit.php" method="post" id="signupForm">

    <div class="fieldContainer">

        <div class="formRow">
            <div class="label">
                <label for="name">Name:</label>
            </div>
            
            <div class="field">
                <input type="text" name="name" id="name" />
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <label for="email">Email:</label>
            </div>
            
            <div class="field">
                <input type="email" name="email" id="email" />
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

<?include("core/footer.php"); ?>

</body>
</html>
