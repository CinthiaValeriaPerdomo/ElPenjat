<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Penjat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="index">
    <!-- 
    Specs d'aquesta pàgina:
    
     7. Pàgina index.php            | HTML+CSS
     8. Funcionalitat botó Iniciar  | JS
    14. Missatge <noscript>         | HTML
    
    (temporal, esborrar cada spec segons s'acabin i el comentari en acabar totes)
    -->
    <div class="container">
        <div class="imagen-titulo">
            <img src="assets/images/barret-bruixa.png" alt="" class="img">
            <h1>El Penjat</h1>
        </div>
        <div id="description">
            <p>Estaves explorant una mansió encantada. De sobte, va aparèixer la bruixa, la mestressa de la mansió. T'ha acorralat i ha conjurat un encanteri per condemnar-te a viure junt amb els seus espirits per sempre.</p>
            <p class="gold-text">Podràs fer servir la teva habilitat lèxica per superar el seu joc malvat i escapar amb vida?</p>
        </div>

        <div id="linea"></div>
        <form action="play.php" method="post">
            <div class="flex-center">
            
                <div>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" placeholder="El teu nom ..." name="nom">
                </div>
                
                <div>
                    <label for="nivell">Dificultat: </label>
                    <select name="nivell" id="nivell">
                        <option>Fàcil</option>
                        <option selected>Normal</option>
                        <option>Difcil</option>
                    </select>

                </div>
            </div>
            <button type="submit" class="jugar">JUGAR</button>

        </form>

        <div class="zona-ranking">
            <a id="a-ranking" href="ranking.php">Veure Ranking</a>
        </div>
            
       
        
    </div>
</body>
</html>