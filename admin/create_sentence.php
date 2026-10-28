<?php
    session_start();
    require_once __DIR__ . "/../localization.php";
    setPage("admin/create_sentence.php");

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
    $facil = t("diff-easy");
    $normal = t("diff-normal");
    $dificil = t("diff-hard");
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3><?= t("admin-header") ?></h3>
            <p><?= t("admin-greeting").$_SESSION["admin-username"] ?></p>
            <a id="logout" class="link-button secondary" href="logout.php">
                <?= t("link-to-logout") ?>
            </a>
        </div>
    </header>

    <div class="container">
        <h1><?= t("title") ?></h1>
        <form action="create_sentence.php" method="post">
            <input type="text" id="frase" name="frase">
            <p><?= t("p-difficulty") ?><span id="dificultat">_____</span></p>
            <button type="submit"><?= t("submit-add") ?></button>
        </form>
    </div>

    <script>
        const tFacil = "<?php echo $facil; ?>";
        const tNormal = "<?php echo $normal; ?>";
        const tDificil = "<?php echo $dificil; ?>";
    </script> 
    <script src="../scripts/create_sentence.js"></script>
</body>
</html>