<?php
session_start();
$id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

function prihlaseni($id) {
    if ($id) {
        return '<li><a href="https://novyma23.sps-prosek.cz/javascript/projekt/template/logout.php">Odhlásit se</a></li>';
    } else {
        return '<li><a href="login.php">Přihlásit se</a></li>';
    }
}
?>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework Master</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 20px 20px; /* Zvětšení paddingu pro větší výšku lišty */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: black;
        }
        .navbar .menu {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .navbar .menu li {
            margin: 0 10px;
        }
        .navbar .menu a {
            text-decoration: none;
            color: black;
            padding: 10px 20px;
            border-radius: 25px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .navbar .menu a:hover {
            background-color: #e0e0e0;
            border-color: #bbb;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">Homework Master</div>
    <ul class="menu">
        <li><a href="https://novyma23.sps-prosek.cz/javascript/projekt/mainpage.php">Domů</a></li>
        <?php
        echo prihlaseni($id);
        ?>
    </ul>
</div>
</body>
</html>