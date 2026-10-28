<?php
    session_start();
    require_once __DIR__ . "/../localization.php";
    setPage("play.php");

    if (isset($_POST["fi"])) {
        $_SESSION["guanyat"] = ($_POST["guanyat"] == "1");
        $_SESSION["acces_correcte"] = true;
        $_SESSION["puntuacio"] = $_POST["puntuacio"];
        $_SESSION["data"] = date('Y-m-d H:i:s');
        header("Location: gameover.php");
        exit();
    }
    if (!isset($_POST["nom"])) {
        header("Location: index.php");
        exit();
    }

    $_SESSION["nom"] = $_POST["nom"];
    $nivell = $_POST["nivell"];

    require_once 'functions.php';

function escogerFrase($frases, $nivell){
    [$facil, $normal, $dificil] = clasificar($frases);

    if ($nivell === "Fàcil"){
        $seleccion = $facil;
    }elseif ($nivell === "Normal"){
        $seleccion = $normal;
    }else{
        $seleccion = $dificil;
    }

    if (empty($seleccion)){
        return null;
    }

    return $seleccion[array_rand($seleccion)];
}

$fitxer = "sentences_ca.txt";
$frases = file($fitxer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$frase = escogerFrase($frases, $nivell);

if ($frase === null) {
    // no hay frases de ese nivel: coge cualquiera para que el juego no se rompa
    $frase = $frases[array_rand($frases)];
}

$frase = mb_strtoupper($frase, "UTF-8");

?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="play">
    <noscript class="flex-center">
        <div>
            <h3><?= t("noscript-title") ?></h3>
            <p class="gold-text"><?= t("noscript-p1") ?></p>
            <p><?= t("noscript-p2") ?></p>
        </div>
    </noscript>

    <audio><source src="assets/audio/encert1.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/encert2.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/encert3.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/error1.wav"  type="audio/wav"></audio>
    <audio><source src="assets/audio/error2.wav"  type="audio/wav"></audio>
    <audio><source src="assets/audio/error3.wav"  type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa1.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa2.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa3.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa4.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa5.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa6.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa7.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa8.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/riure-de-bruixa9.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/bach.wav"        type="audio/wav"></audio>
    <audio><source src="assets/audio/aplaudiment.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/horror-shock.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/skeleton-music-intro.wav" type="audio/wav"></audio>
    <audio><source src="assets/audio/skeleton-music-loop.wav" type="audio/wav"></audio>    

    <div class="container" id="container-play">
        <h1><?= t("title") ?></h1>
        <h6><?= t("subtitle") ?></h6>
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
            <input type="hidden" name="puntuacio" id="puntuacio" value="0">
        </form>
    </div>
    <div id="mensaje-error" class="fondo-alerta oculto">
        <div class="alerta">
            <span id="texto-alerta">    
                <?= t("alert") ?>
            </span>
            <button onclick="cerrarMensaje()" class="btn-cerrar">X</button>
        </div>
    </div>

    <div id="egg" class="flex-center">
        <div class="calavera">
            <img src="assets/images/calavera.png" alt="">
            <span class="ojo ojo-izq"></span>
            <span class="ojo ojo-der"></span>
        </div>
    </div>

    <script>
        const frase = "<?php echo $frase; ?>";
        console.log("test frase:",frase);
    </script>
    <script src="scripts/play.js"></script>
</body>
</html>