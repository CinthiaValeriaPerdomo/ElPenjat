<?php
session_start();
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Iniciar sessió</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
        </div>  
    </header>
    <div class="container">
        <h1>Iniciar sessió</h1>
        <form action="index.php" method="post">
            <?php
            if ($_SESSION["admin-access"] == "N") {
                echo "<h3 id='wrong-credentials'>";
                echo "Credencials incorrectes";
                echo "</h3>\n";
                unset($_SESSION["admin-access"]);
            }
            ?>
            <div class="flex-center">
                
                <label for="username">Nom d'usuari</label>
                <input type="text" id="username" name="username">
                <label for="password">Contrasenya</label>
                <input type="text" id="password" name="password">
            </div>
            <button type="submit">Iniciar sessió</button>
        </form>
    </div>
</body>
</html>