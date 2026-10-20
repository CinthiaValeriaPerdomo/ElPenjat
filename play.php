<?php
    session_start();


    if (isset($_POST["fi"])) {
        $_SESSION["guanyat"] = ($_POST["guanyat"] == "1");
        $_SESSION["acces_correcte"] = true;
        header("Location: gameover.php");
        die();
    }
    if (!isset($_POST["nom"])) {
        header("Location: index.php");
        die();
    }

    $_SESSION["nom"] = $_POST["nom"];
    $nivell = $_POST["nivell"];

    if ($nivell == "Fàcil") {
        $fitxer = "data/facil.txt";
    } elseif ($nivell == "Normal") {
        $fitxer = "data/normal.txt";
    } else {
        $fitxer = "data/dificil.txt";
    }
    $frases = file($fitxer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $frase = mb_strtoupper($frases[array_rand($frases)], "UTF-8");


?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjat - Partida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="play">
    <!-- 
    Specs d'aquesta pàgina:
    
     9. Pàgina play.php         | HTML+CSS, PHP, JS
    10. Gestió mecànica bàsica  | JS
    11. Gestió final del joc    | JS
    12. Puntuació               | JS
    14. Missatge <noscript>     | HTML+CSS
    15. Efectes de sons         | JS 
    
    (temporal, esborrar cada spec segons s'acabin i el comentari en acabar totes)
    -->

    <div class="container" id="container-play">
        <h1>LA MANSIÓ EMBRUIXADA</h1>
        <h6 class="gold-text">DESCOBREIX EL MISTERI</h6>
        <p id="frase"></p>
        <img id="penjat" src="assets/images/penjat-0.png" alt="Penjat" width="200">
        <table id="teclat">
            <?php
                for ($i = 65; $i <= 90; $i++) { 
                    $l = chr($i);
                    if (($i - 65) % 13 == 0) { 
                        echo " <tr>"; 
                    }
                    echo '<td><button type="button" class="tecla">' . $l . '</button></td>';
                    if (($i - 65) % 13 == 12) { 
                        echo "</tr>\n";
                    }
                } 
            ?>
        </table>
        <form id="form-fi" action="play.php" method="post">
            <input type="hidden" name="fi" value="1">
            <input type="hidden" name="guanyat" id="guanyat" value="0">
        </form>
    </div>

    <script>
        const frase = "<?= $frase ?>";
    </script>
    <script src="scripts/play.js"></script>
</body>
</html>