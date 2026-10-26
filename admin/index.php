<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Inici</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
            <p>Hola, labruixa<?= $_SESSION["admin-username"]?></p>
            <a href="logout.php">Tancar sessió</a>
        </div>
    </header>
</body>
</html>