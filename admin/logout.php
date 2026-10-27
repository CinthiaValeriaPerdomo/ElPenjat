<?php
session_start();

if ($_SESSION["admin-access"] != "S") {
    header('Location: /admin/login.php');
    exit();
}

unset($_SESSION["admin-username"]);
unset($_SESSION["admin-access"]);
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Tancar sessió</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
        </div>
    </header>
    <div class="container">
        <h3>Sessió tancada</h3>
        <p>Ja pots tancar la pestanya.</p>
    </div>
</body>
</html>