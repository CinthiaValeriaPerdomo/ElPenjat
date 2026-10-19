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
        <h1>El Penjat</h1>
        <div id="description">
            <p>Estaves explorant una mansió encantada. De sobte, va aparèixer la bruixa, la mestressa de la mansió. T'ha acorralat i ha conjurat un encanteri per condemnar-te a viure junt amb els seus espirits per sempre.</p>
            <p class="gold-text">Podràs fer servir la teva habilitat lèxica per superar el seujoc malvat i escapar amb vida?</p>
        </div>

        <div class="linea"></div>
        <form action="index.php" method="post">
            <div class="flex-center">
            
                <div>
                    <label for="nom">Nom:<label>
                    <input type="text" id="nom" placeholder="El teu nom" name="nom">
                </div>
                
                <div>
                    <label for="nivell">Dificultat: </label>
                    <select name="nivell" id="nivell">
                        <option>Facil</option>
                        <option selected>Normal</option>
                        <option>Dificil</option>
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