<?php
    session_start();
    require_once "/localization.php";
    setPage("admin/logout.php");

    if ($_SESSION["admin-access"] != "S") {
        header('Location: /admin/login.php');
        exit();
    }

    unset($_SESSION["admin-username"]);
    unset($_SESSION["admin-access"]);
?><!DOCTYPE html>
<html lang="<?= getLang() ?>">
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
        </div>
    </header>
    <div class="container">
        <h3><?= t("title") ?></h3>
        <p><?= t("subtitle") ?></p>
    </div>
</body>
</html>