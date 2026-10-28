<?php
    session_start();
    require_once "localization.php";
    setPage("index.php");

    if(!isset($_SESSION["lang"])) {
        setLang("ca");
    }
    if(isset($_GET["lang"])) {
        setLang($_GET["lang"]);
    }
?><!DOCTYPE html>
<html lang="<?= getLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css?v=2">
    <script src="./scripts/index.js" defer></script> 
</head>
<body id="index">
    <noscript class="flex-center">
        <div>
            <h3><?= t("noscript-title") ?></h3>
            <p class="gold-text"><?= t("noscript-p1") ?></p>
            <p><?= t("noscript-p2") ?></p>
        </div>
    </noscript>

    <div class="container">
        <div class="flex-center" id="lang-selection">
            <a href="?lang=ca" id="lang-ca" class="link-button">Català</a>
            <a href="?lang=es" id="lang-es" class="link-button">Español</a>
            <a href="?lang=en" id="lang-en" class="link-button">English</a>
        </div>
        <div id="game-title">
            <h1><?= t("game-title") ?></h1>
            <img src="assets/images/barret-bruixa.png" alt="" id="img-barret">
        </div>
        <div id="description">
            <p><?= t("desc-p1") ?></p>
            <p class="gold-text"><?= t("desc-p2") ?></p>
        </div>

        <div id="linea"></div> <!--novalidate es un atributo booleano que desactiva la validacion nativa del navegador -->
        <form id="form-jugar" action="play.php" method="post" novalidate>
            <div class="flex-center">
                <div>
                    <label for="nom"><?= t("label-name") ?></label>
                    <input 
                        type="text" id="nom" 
                        placeholder="<?= t("input-name-placeholder") ?>"
                        name="nom" value="<?php echo $_SESSION["nom"] ?? ""; ?>"
                    />
                    <div id="error-nombre"></div>
                </div>
                
                <div>
                    <label for="nivell"><?= t("label-diff") ?></label>
                    <select name="nivell" id="nivell">
                        <option value="Fàcil"><?= t("diff-easy") ?></option>
                        <option value="Normal" selected><?= t("diff-normal") ?></option>
                        <option value="Difícil"><?= t("diff-hard") ?></option>
                    </select>
                </div>
            </div>
            <button type="submit" id="jugar" disabled><?= t("button-play") ?></button>
        </form>

        <a href="ranking.php" class="link-button secondary"><?= t("link-to-ranking") ?></a>
    </div>
</body>
</html>