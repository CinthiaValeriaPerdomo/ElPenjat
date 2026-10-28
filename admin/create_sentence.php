<?php
session_start();

  if ($_SESSION["admin-access"] != "S") {
        header('Location: /admin/login.php');
        exit();
    }

  if (!empty($_POST["frase"])) {
        $frase = trim($_POST["frase"]);
        $frases = file("../sentences_ca.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (in_array($frase, $frases)) {
            $_SESSION['feedback'] = "<p class='error'>La frase ja existeix.</p>";
        } else {
            $frases[] = $frase;
            if (file_put_contents("../sentences_ca.txt", implode("\n", $frases)) !== false) {
                $_SESSION['feedback'] = "<p class='success'>La frase '<em>" . htmlspecialchars($frase) . "</em>' s'ha afegit correctament!</p>";
            } else {
                $_SESSION['feedback'] = "<p class='error'>Error en afegir la frase.</p>";
            }
        }
        header("Location: list_sentences.php");
        exit();
    }
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Crear frase</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
            <p>Hola, <?= $_SESSION["admin-username"]?></p>
        </div>
        <a href="logout.php">Tancar sessió</a>
    </header>

    <div class="container">
        <h1>AFEGIR FRASE</h1>
        <form action="create_sentence.php" method="post">
            <input type="text" id="frase" name="frase">
            <p>Dificultat: <span id="dificultat">_____</span></p>
            <button type="submit">Afegir</button>
        </form>
    </div>

    <script src="../scripts/create_sentence.js"></script>
</body>
</html>