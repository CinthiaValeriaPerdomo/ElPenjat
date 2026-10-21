<?php
    session_start();

    // Redirecció
    if (!isset($_SESSION["acces_correcte"])) {
        header('Location: error403.php');
        exit();
    } else {
        unset($_SESSION["acces_correcte"]);
    }
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjat - Fi de partida</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/gameover.js" defer></script>
</head>
<body id="gameover">
    <!-- 
    Specs d'aquesta pàgina:
    
    15. Efectes de sons     | JS 
    
    (temporal, esborrar cada spec segons s'acabin i el comentari en acabar totes)
    -->

    <audio><source src="assets/audio/segellar.wav" type="audio/wav"></audio>

    <div class="container">
        <?php 
        echo $_SESSION["guanyat"] 
            ? '<h1 id="game-win">'."\n" 
            : '<h1 id="game-loss">'."\n";
        ?>
            Fi de partida
        </h1>
        <h6 class="gold-text">
            <?php 
            echo $_SESSION["guanyat"] 
                ? "Has escapat de la mansió!" 
                : "T'has convertit en un dels seus esperits." 
            ?>
        </h6>

        <form action="ranking.php" method="post">
            <p>Vols enregistrar el teu récord?</p>
            <div class="flex-center">
                <button type="submit" value="S">Sí</button>
                <button type="submit" value="N" class="secondary">No, gràcies.</button>
                <input type="hidden" name="resposta" id="resposta">
            </div>
        </form>
    </div>
</body>
</html>