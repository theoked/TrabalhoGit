<?php
// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// This is the URL your users are redirected,
// when registered succesfully:

$redirectURL = 'home.php';

$errors = array();

// Checking the input data and adding potential errors to the $errors array:

if(!$_POST['email'] || !preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email'])){
    $errors['email']='Favor informar um email válido!';
}

if(!$_POST['pass'] || strlen($_POST['pass'])<5){
    $errors['pass']='Favor infomar senha válida!<br />Com no mínimo 5 caracteres.';
}

// Checking whether the request was sent via AJAX
// (we manually send the fromAjax var with the AJAX request):

if($_POST['fromAjax'])
{
    if(count($errors))
    {
        $errString = array();
        foreach($errors as $k=>$v)
        {
            // The name of the field that caused the error, and the
            // error text are grouped as key/value pair for the JSON response:
            $errString[]='"'.$k.'":"'.$v.'"';
        }
        
        // JSON error response:
        die    ('{"status":0,'.join(',',$errString).'}');
    }
    
    // JSON success response. Returns the redirect URL:
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