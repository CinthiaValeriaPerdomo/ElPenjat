<?php
    session_start();
    // if(!isset($_SESSION["admin-username"])){
    //     header("Location: login.php");
    //     exit();
    // }

    if(!empty($_POST["frase"])){

        $frase= trim($_POST["frase"]);
        $frasesStr = file_get_contents("../sentences_ca.txt");

        $pos = $_POST["pos"];

        if (str_contains($frasesStr,$frase)) {
            $frasesNuevas = str_replace($frase . PHP_EOL, "", $frasesStr);
            file_put_contents(../sentences_ca_temp.txt", $frasesNuevas);
        }


    }
?><!DOCTYPE html>
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







</body>
</html>