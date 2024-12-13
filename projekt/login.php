<?php
    include "dbcopy.php";

    session_start();

    if (isset($_SESSION["error"]["email"])) {
        echo $_SESSION["error"]["email"];   
    }
    if (isset($_SESSION["error"]["heslo"])) {
        echo $_SESSION["error"]["heslo"];    
    }

    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="csslogin.css">

</head>
    <body>
        <div id="login">
            <h2>Přihlášení</h2>
            <form action="actionlogin.php" method="post">
                <label for="email">Email:</label>
                <br>                
                <input type="text" name="email" >
                <br>
                <label for="heslo">Heslo:</label>
                <br>
                <input type="password" name="heslo" >
                <br>
                <input type="submit" value="Přihlásit se">
                <p></p><a href="https://novyma23.sps-prosek.cz/javascript/projekt/register.php">Nová Registrace</a>
            </form> 
        </div>
    </body>
</html> 
