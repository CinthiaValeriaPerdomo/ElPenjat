<?php 
    session_start();
    require_once "../localization.php";
    setPage("admin/list_sentences.php");

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

    <?php if(!empty($_SESSION['feedback'])): ?>
        <div class="feedback">
            <?php 
            echo $_SESSION['feedback']; 
            unset($_SESSION['feedback']);
            ?>
        </div>
    <?php endif; ?>
    
    <div class="container">
        <h1><?= t("title") ?></h1>
        <table>
            <thead id="phrases-header">
                <tr>
                    <th><?= t("th1") ?></th>
                    <th><?= t("th2") ?></th>
                    <th><?= t("th3") ?></th>
                </tr>
            </thead>
            <tbody id="phrases-rows">
                <?php
                    $frasesStr = explode("\n", file_get_contents("../sentences_".getLang().".txt"));
                    require_once '../functions.php';
                    $frasesClasificadas = clasificar($frasesStr);
                    foreach ($frasesStr as $i => $frase) {
                        echo "<tr>";
                        echo "<td>$frase</td>";
                        if (in_array($frase,$frasesClasificadas[0])) {
                            echo "<td>".t("diff-easy")."</td>";
                        }elseif(in_array($frase,$frasesClasificadas[1])){
                            echo "<td>".t("diff-normal")."</td>";
                        }else{
                            echo "<td>".t("diff-hard")."</td>";
                        }     
                ?>
                <td>
                    <form action="delete_sentence.php" method="post">
                        <input type="hidden" name="frase" id="frase" value="<?php echo htmlspecialchars($frase) ?>">
                        <input type="hidden" name="pos" id="pos" value="<?php echo $i ?>">
                        <input type="submit" id="Eliminar" value="Eliminar">
                    </form>
                </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>