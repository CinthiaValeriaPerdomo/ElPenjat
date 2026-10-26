<?php
    session_start();

    

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

    //print_r($_SESSION);

    $_SESSION["nom"] = $_POST["nom"];
    $nivell = $_POST["nivell"];
    $frases = "data/catala.txt";




function dificultat($frases, $nivell){

    foreach ($frases as $i => $frase){
        $abecedario = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",];
        $facil = [];
        $normal = [];
        $dificil = [];
        

        $fraseBase = preg_replace('/[^A-ZÀÈÉÍÏÒÓÚÜÇ]/u', '', mb_strtoupper($frase, 'UTF-8'));

        // $letrasDiferentes = array_filter($abecedario, fn($letraABC) => in_array($letraABC, $fraseBase));

        $letrasDiferentes = array_unique(mb_str_split($fraseBase));  

        $letrasPendientes = array_filter(
            $abecedario, 
            fn($letraABC) => !in_array($letraABC, $letrasDiferentes)
            );
        $letrasFaltantes = count($letrasPendientes);

        $lenFrase = mb_strlen($fraseBase, 'UTF-8');


        if ($letrasFaltantes >= 19){
            if ($lenFrase <= 20){
                $dificil[] = $frase;
            } else{
                $normal[] = $frase;
            }
        }elseif ($letrasFaltantes <= 9){
            if ($lenFrase >= 41){
                $facil[] = $frase;
            }
        }else {
            $normal[] = $frase;
        }

    }

    if ($nivell === "facil"){
        $seleccion = $facil;
    }elseif ($nivell === "normal"){
        $seleccion = $normal;
    }else{
        $seleccion = $dificil;
    }

    if (empty($seleccion)){
        return null;
    }

    return $seleccion[array_rand($seleccion)];
}
    // if ($nivell == "Fàcil") {
    //     $fitxer = "data/facil.txt";
    // } elseif ($nivell == "Normal") {
    //     $fitxer = "data/normal.txt";
    // } else {
    //     $fitxer = "data/dificil.txt";
    // }

    




    $frases = file($fitxer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // $frase = mb_strtoupper($frases[array_rand($frases)], "UTF-8");
?><!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjat - Partida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="play">
    <noscript class="flex-center">
        <div>
            <h3>! JavaScript desactivat !</h3>
            <p class="gold-text">És necessari el JavaScript per jugar a aquest joc.</p>
            <p>Activa'l al teu navegador.</p>
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

    <div class="container" id="container-play">
        <h1>LA MANSIÓ EMBRUIXADA</h1>
        <h6>DESCOBREIX EL MISTERI</h6>
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
    <div id="mensaje-error" class="alerta oculto">
        <span id="texto-alerta">REQUISITOS DE ENTRADA: <br>
            El patrón debe contener tres consonantes consecutivas seguidas de una vocal (ejemplo: "trpA"). <br>
            Por favor, ingrese o seleccione según el formato indicado.
        </span>
        <button onclick="cerrarMensaje()" class="btn-cerrar">X</button>
    </div>

    <script>
        const frase = "<?php echo $frase; ?>";
        console.log("test frase:",frase);
    </script>
    <script src="scripts/play.js"></script>
</body>
</html>