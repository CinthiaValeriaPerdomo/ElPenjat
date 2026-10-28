<?php
    session_start();
    require_once "localization.php";
    setPage("error403.php");

?><!DOCTYPE html>
<html lang="<?= getLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="error403">
    <div class="container">
        <div class="flex-center">
            <img class="error-image" src="./assets/images/stop-hand.svg" alt="STOP (mà)"/>
            <h1><?= t("title") ?></h1>
            <img class="error-image" src="./assets/images/stop-hand.svg" alt="STOP (mà)"/>
        </div>
        <h6 class="gold-text"><?= t("subtitle") ?></h6>
        <div class="flex-center">
            <p class="note-from-witch"><?= t("note-from-witch") ?></p>
        </div>
        <a href="index.php" class="link-button"><?= t("link-to-index") ?></a>
    </div>
</body>
</html>