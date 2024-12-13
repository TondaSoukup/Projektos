<?php
    include "dbcopy.php";
    session_start();

    if (isset($_SESSION["error"]["email"])) {
        echo $_SESSION["error"]["email"];   
    }
    if (isset($_SESSION["error"]["heslo"])) {
          echo $_SESSION["error"]["heslo"];    
    }
    if (isset($_SESSION["error"]["heslo_"])) {
         echo $_SESSION["error"]["heslo_"];  
    }
    if (isset($_SESSION["porovnavani"])) {
        echo $_SESSION["porovnavani"]; 
    }

    session_destroy();
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="cssregister.css">

    
</head>
    <body>
        <div id= "register" >
            <h2>Registrace</h2>
            <form action="actionregister.php" method="post">
                <label for="email">Email:</label>
                <br>                
                <input type="text"  name="email" >
                <br>
                <label for="heslo">Heslo:</label>
                <br>
                <input type="password"  name="heslo" >
                <br>
                <label for="heslo_">Potvzeni Hesla:</label>
                <br>
                <input type="password"  name="heslo_" >
                <br>
                <input type="submit" value="Zaregistrovat se">
            </form> 
        </div>
        
    </body>
</html> 