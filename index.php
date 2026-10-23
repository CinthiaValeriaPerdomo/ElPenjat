<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Penjat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css?v=2">
    <script src="./scripts/index.js" defer></script> 
</head>
<body id="index">
    <noscript class="flex-center">
        <div>
            <h3>! JavaScript desactivat !</h3>
            <p class="gold-text">És necessari el JavaScript per jugar a aquest joc.</p>
            <p>Activa'l al teu navegador.</p>
        </div>
    </noscript>

    <div class="container">
        <div id="game-title">
            <img src="assets/images/barret-bruixa.png" alt="" id="img-barret">
            <h1>El Penjat</h1>
        </div>
        <div id="description">
            <p>Estaves explorant una mansió encantada. De sobte, va aparèixer la bruixa, la mestressa de la mansió. T'ha acorralat i ha conjurat un encanteri per condemnar-te a viure junt amb els seus espirits per sempre.</p>
            <p class="gold-text">Podràs fer servir la teva habilitat lèxica per superar el seu joc malvat i escapar amb vida?</p>
        </div>

        <div id="linea"></div> <!--novalidate es un atributo booleano que desactiva la validacion nativa del navegador -->
        <form id="form-jugar" action="play.php" method="post" novalidate>
            <div class="flex-center">
                <div>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" placeholder="El teu nom ..." name="nom">
                    <div id = "error-nombre"></div>
                </div>
                
                <div>
                    <label for="nivell">Dificultat: </label>
                    <select name="nivell" id="nivell">
                        <option value="facil">Fàcil</option>
                        <option  value="normal" selected>Normal</option>
                        <option value="dificil">Dificil</option>
                    </select>
                </div>
            </div>
            <button type="submit" id="jugar" disabled>JUGAR</button>
        </form>

        <a href="ranking.php" class="link-button secondary">Veure Ranking</a>
    </div>
</body>
</html>