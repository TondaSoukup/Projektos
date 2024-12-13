<?php
    include "dbcopy.php";

    session_start();

    $c = 0;
    if (isset($_POST["email"]) AND !empty($_POST["email"]) AND !preg_match("/^[a-zA-Z-' ]*$/", $_POST["email"]) AND strlen($_POST["email"]) >=5){
        $email = $_POST["email"];
        $_SESSION["email"] = $_POST["email"];   
        $c++; 
    } else {
        $_SESSION["error"]["email"] = "Nemate zadany email<br>";
    }

    if (isset($_POST["heslo"]) AND !empty($_POST["heslo"])){
        $heslo = $_POST["heslo"];
        $_SESSION["heslo"] = $_POST["heslo"];   
        $c++;
    } else {
        $_SESSION["error"]["heslo"] = "Nemate zadane spravne heslo<br>";
    }

    if ($c == 2) {
        $sql_check = "SELECT * FROM projekt_register WHERE email = :email";
        $stmt = $db->prepare($sql_check);
        $stmt->execute([":email" => $email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($heslo, $user["heslo"])) {
                $_SESSION["user_id"] = $user["ID_register"];
                $_SESSION["email"] = $user["email"];
                header("Location: mainpage.php");
                return;  
            } else {
                $_SESSION["error"]["heslo"] = "Nesprávné heslo.";
                header("Location: login.php");
                return;  
            }
        } else {
            $_SESSION["error"]["email"] = "Tento e-mail není zaregistrován.";
            header("Location: login.php");
            return;  
        }
    } else {
        header("Location: login.php");
        return;  
    }
?>
