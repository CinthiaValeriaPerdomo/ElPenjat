<?php
    session_start();

    if ($_SESSION["admin-access"] != "S") {
        header('Location: /admin/login.php');
         exit();
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
            <a href="logout.php">Tancar sessió</a>
        </div>
    </header>

    <div class="container">

        <?php
            $frasesStr = file_get_contents("../sentences_ca.txt");
            $frases = explode("\n", $frasesStr);
            $pos = $_POST["pos"];
            $frase = $frases[$pos];
        ?>
        <h1 id="confirm-delete">
            Vols eliminar aquesta frase?
        </h1><br>
        <h2><?php echo $_POST["frase"] ?></h2><br><br><br><br>

        <?php
            if (isset($_POST["resposta"]) && $_POST["resposta"] == "si") {
                unset($frases[$pos]);
                if (file_put_contents("../sentences_ca.txt", implode("\n", $frases)) !== false) {
                    $_SESSION['feedback'] = "<p class='success'>La frase '<em>". $_POST["frase"]."</em>' es va esborrar correctament!</p>";
                }else {
                    $_SESSION['feedback'] = "<p class='error'>Error en eliminar la frase.</p>";
                }
                header("Location: list_sentences.php");
                exit();
            }
            
            if (isset($_POST["resposta"]) && $_POST["resposta"] == "no") {
                header("Location: list_sentences.php");
                exit();
            }
        ?>
        
        <form action="delete_sentence.php" method="post">
            <input type="hidden" name="frase" value="<?php echo $_POST["frase"] ?>">
            <input type="hidden" name="pos" value="<?php echo $_POST["pos"] ?>">
            <div class="flex-center">
                <button type="submit" name="resposta" value="si" id="confirm-input">Eliminar</button>
                <button type="submit" name="resposta" value="no" id="confirm-input">Cancelar</button>
            </div>
        </form>
    </div>


</body>
</html>