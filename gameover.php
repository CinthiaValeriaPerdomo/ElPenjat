<?php
    session_start();
    require_once "localization.php";
    setPage("gameover.php");
    //print_r($_SESSION);

    // Redirecció
    if (!isset($_SESSION["acces_correcte"])) {
        header('Location: error403.php');
        exit();
    }else {
        unset($_SESSION["acces_correcte"]);
    }
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/gameover.js" defer></script>
</head>
<body id="gameover">
    <audio><source src="assets/audio/segellar.wav" type="audio/wav"></audio>

    <div class="container">
        <?php 
        echo $_SESSION["guanyat"] 
            ? '<h1 id="game-win">'."\n" 
            : '<h1 id="game-loss">'."\n";
        ?>
            <?= t("title") ?>
        </h1>
        <h6 class="gold-text">
            <?php 
            echo $_SESSION["guanyat"] 
                ? t("subtitle-win")
                : t("subtitle-loss");
            ?>
        </h6>

        <form action="ranking.php" method="post">
            <p><?= t("log-record") ?></p>
            <div class="flex-center">
                <button type="submit" value="S"><?= t("submit-yes") ?></button>
                <button type="submit" value="N" class="secondary"><?= t("submit-no") ?></button>
                <input type="hidden" name="resposta" id="resposta">
            </div>
        </form>
    </div>
</body>
</html>