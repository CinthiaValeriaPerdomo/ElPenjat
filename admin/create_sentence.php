<?php
session_start();

if ($_SESSION["admin-access"] != "S") {
    header('Location: /admin/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Crear frase</title>
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
            <p>Hola, <?= $_SESSION["admin-username"]?></p>
        </div>
        <a href="logout.php">Tancar sessió</a>
    </header>
</body>
</html>