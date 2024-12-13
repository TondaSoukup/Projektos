<?php
    include "dbcopy.php";

    session_start();

    $c = 0;
    if (isset($_POST["email"]) AND !empty($_POST["email"]) AND !preg_match("/^[a-zA-Z-' ]*$/",$_POST["email"]) AND strlen($_POST["email"]) >=5){
        $email = $_POST["email"];
        $_SESSION["email"] = $_POST["email"];   
        $c++; 
    } else {
        $_SESSION["error"]["email"] = "Mas spatne zadany email<br>";
    }

    if (isset($_POST["heslo"]) AND !empty($_POST["heslo"]) ){
        $heslo = $_POST["heslo"];
        $_SESSION["heslo"] = $_POST["heslo"];   
        $c++; 
    } else {
        $_SESSION["error"]["heslo"] = "Nemate zadane heslo<br>";
    }

    if (isset($_POST["heslo_"]) AND !empty($_POST["heslo_"])){
        $heslo_ = $_POST["heslo_"];
        $_SESSION["heslo_"] = $_POST["heslo_"];   
        $c++; 
    } else {
        $_SESSION["error"]["heslo_"] = "Nemate zadane stejne heslo<br>";
    }

    if ($c == 3) {
        if ($heslo == $heslo_) {
    
            $sql_check = "SELECT * FROM projekt_register WHERE email = :email";
            $stmt = $db->prepare($sql_check);
            $stmt->execute([":email" => $email]);
    
            if ($stmt->rowCount() > 0) {
                $_SESSION["error"]["email"] = "Tento e-mail je již zaregistrován.";
                header("Location: register.php");
                return;  
            }

            $sql = "INSERT INTO projekt_register (ID_register, email, heslo, time) VALUES (null, :email, :heslo, null)";
            $heslohash = password_hash($heslo, PASSWORD_DEFAULT);
    
            $ins = [
                ":email" => $email,
                ":heslo" => $heslohash
            ];
    
            $con = $db->prepare($sql);
            $con->execute($ins);
            $ano = $db->lastInsertID();
            
            header("Location: login.php");
            return;  
        } else {
            $_SESSION["porovnavani"] = "Vaše hesla se neshodují.";
            header("Location: register.php");
            return;  
        }
    } else {
        header("Location: register.php");
        return;  
    }
?>
