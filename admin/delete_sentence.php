<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Eliminar frase</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
            <p>Hola, <?= $_SESSION["admin-username"]?></p>
            <a id="logout" class="link-button" href="logout.php">
                <img src="../assets/images/logout.svg" alt="">
                    Tancar sessió
            </a>
        </div>
    </header>

    <p><?php echo $_POST["frase"]; ?></p>
    <p><?php echo $_POST["pos"]; ?></p>



</body>
</html>