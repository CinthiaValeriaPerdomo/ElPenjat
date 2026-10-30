<?php
    session_start();
    require_once "../localization.php";
    setPage("admin/delete_sentence.php");

    if ($_SESSION["admin-access"] != "S") {
        header('Location: /admin/login.php');
         exit();
    }
    
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
            <p><?= t("admin-greeting").$_SESSION["admin-username"] ?></p>
            <a id="logout" class="link-button secondary" href="logout.php">
                <?= t("link-to-logout") ?>
            </a>
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
            <?= t("title") ?>
        </h1><br>
        <h2><?php echo $_POST["frase"] ?></h2><br><br><br><br>

        <?php
            if (isset($_POST["resposta"]) && $_POST["resposta"] == "si") {
                unset($frases[$pos]);
                if (file_put_contents("../sentences_ca.txt", implode("\n", $frases)) !== false) {
                    $_SESSION['feedback'] = "<p class='success'>".t("feedback-success-substr1")."<em>". $_POST["frase"]."</em>".t("feedback-success-substr2")."</p>";
                }else {
                    $_SESSION['feedback'] = "<p class='error'>".t("feedback-error")."</p>";
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
                <button type="submit" name="resposta" value="si" id="confirm-input">
                    <?= t("button-confirm") ?>
                </button>
                <button type="submit" name="resposta" value="no" id="confirm-input">
                    <?= t("button-cancel") ?>
                </button>
            </div>
        </form>
    </div>


</body>
</html>