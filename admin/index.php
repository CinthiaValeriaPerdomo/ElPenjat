<?php
    session_start();
    require_once "localization.php";
    setPage("admin/index.php");

    if(!empty($_POST)) {
        $credentialsStr = explode("\n", file_get_contents("credentials.txt"));
        $credentials = [];
        for ($i=0; $i < count($credentialsStr); $i++) { 
            $cred = explode(":", $credentialsStr[$i]);
            $credentials[$cred[0]] = $cred[1];
        }

        $_SESSION["admin-access"] = "S";
        foreach ($credentials as $key => $value) {
            if ($_POST[$key] != $value) {
                $_SESSION["admin-access"] = "N";
            } else if ($key == "username") {
                $_SESSION["admin-username"] = $value;
            }
        }
    }

    if ($_SESSION["admin-access"] != "S") {
        header('Location: /admin/login.php');
        exit();
    }
?><!DOCTYPE html>
<html lang=<?= getLangg() ?>>
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
        <div class="flex-center">
            <a href="logout.php" class="link-button secondary"><?= t("link-to-logout") ?></a>
            <a href="list_sentences.php" class="link-button"><?= t("link-to-list-sentences") ?></a>
            <a href="create_sentence.php" class="link-button"><?= t("link-to-create-sentence") ?></a>
        </div>
    </div>
</body>
</html>