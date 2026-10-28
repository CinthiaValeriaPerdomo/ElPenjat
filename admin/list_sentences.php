<?php 
    session_start();
    // if(!isset($_SESSION["admin-username"])){
    //     header("Location: login.php");
    //     exit();
    // }
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Listar frases</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="admin-page">
    <header id="admin-header" class="flex-center">
        <div class="flex-center">
            <h3>Admin</h3>
            <p>Hola, <?= $_SESSION["admin-username"]?></p>
            <a id="logout" class="link-button" href="logout.php">
                <img src="../assets/images/logout.svg" alt="">
                    Tancar sessió
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
        <h1>LLISTAR FRASES</h1>
        <table>
            <thead id="phrases-header">
                <tr>
                    <th>Frase</th>
                    <th>Dificultat</th>
                    <th>Acció</th>
                </tr>
            </thead>
            <tbody id="phrases-rows">
                <?php
                    $frasesStr = explode("\n", file_get_contents("../sentences_ca.txt"));
                    require_once '../functions.php';
                    $frasesClasificadas = clasificar($frasesStr);
                    foreach ($frasesStr as $i => $frase) {
                        echo "<tr>";
                        echo "<td>$frase</td>";
                        if (in_array($frase,$frasesClasificadas[0])) {
                            echo "<td>Fàcil</td>";
                        }elseif(in_array($frase,$frasesClasificadas[1])){
                            echo "<td>Normal</td>";
                        }else{
                            echo "<td>Difícil</td>";
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