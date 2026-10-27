<?php
    session_start();
    require_once "localization.php";
    setPage("error403.php");

?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="error404">
    <div class="container">
        <div class="flex-center">
            <img class="error-image" src="./assets/images/where.png" alt="Senyal groc d'advertència amb ?"/>
            <h1><?= t("title") ?></h1>
            <img class="error-image" src="./assets/images/where.png" alt="Senyal groc d'advertència amb ?"/>
        </div>
        <h6 class="gold-text"><?= t("subtitle") ?></h6>
        <div class="flex-center">
            <p class="note-from-witch"><?= t("note-form-witch") ?></p>
        </div>
        <a href="index.php" class="link-button"><?= t("link-to-index") ?></a><br><br>
        <a href="ranking.php" class="link-button secondary"><?= t("link-to-ranking") ?></a>
    </div>
</body>
</html>