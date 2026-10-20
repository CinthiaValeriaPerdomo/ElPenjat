<?php
    session_start();

    // Redirecció
    if (!isset($_SESSION["acces_correcte"])) {
        header('Location: error403.php');
        die();
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
</head>
<body id="gameover">
    <!-- 
    Specs d'aquesta pàgina:
    
    13. Enregistrar récord  | HTML+CSS, PHP
    15. Efectes de sons     | JS 
    
    (temporal, esborrar cada spec segons s'acabin i el comentari en acabar totes)
    -->
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
                <button type="submit" name="resposta" value="S">Sí</button>
                <button type="submit" name="resposta" value="N" class="secondary">No, gràcies.</button>
            </div>
        </form>
    </div>
</body>
</html>