<?php
    session_start();
    require_once "../localization.php";
    setPage("admin/login.php");

?><!DOCTYPE html>
<html lang="<?= getLang() ?>">
<head>
    <met__DIR__ . a charset="UTF-8">
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
        <h1><?= t("title") ?></h1>
        <form action="index.php" method="post">
            <?php
            if ($_SESSION["admin-access"] == "N") {
                echo "<h3 id='wrong-credentials'>";
                echo t("wrong-credentials");
                echo "</h3>\n";
                unset($_SESSION["admin-access"]);
            }
            ?>
            <div class="flex-center">
                <div>
                    <label for="username"><?= t("label-username") ?></label>
                    <input type="text" id="username" name="username">
                </div>
                <div>
                    <label for="password"><?= t("label-password") ?></label>
                    <input type="text" id="password" name="password">
                </div>
            </div>
            <button type="submit"><?= t("submit") ?></button>
        </form>
    </div>
</body>
</html>