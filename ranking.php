<?php
session_start();
$lastRecord = [];

if ($_POST["resposta"] == "S") {
    $lastRecord = [
        $_SESSION["nom"],
        $_SESSION["puntuacio"],
        $_SESSION["data"]
    ];
    file_put_contents("records.txt", implode(",", $lastRecord)."\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjat - Rànking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="ranking">
    <!-- 
    Specs d'aquesta pàgina:
    
    13. Enregistrar récord  | HTML+CSS, PHP
    15. Efectes de sons     | JS
    
    (temporal, esborrar cada spec segons s'acabin i el comentari en acabar totes)
    -->
    <div class="container">
        <h1>Taula de classificacions</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Puntuació</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $recordsStr = explode("\n", file_get_contents("records.txt"));

                $records = [];
                for ($i=0; $i < count($recordsStr); $i++) {
                    $record = explode(",", $recordsStr[$i]);
                
                    if ($record == [] || $record == [""] || $record[1] == "") continue;

                    $records[] = explode(",", $recordsStr[$i]);
                }

                usort($records, function ($a, $b) {
                    return $b[1] - $a[1];
                });
                
                foreach ($records as $i => $record) {
                    echo $record == $lastRecord 
                        ? '<tr id="last-record">'."\n" 
                        : "<tr>\n";
                    foreach ($record as $i => $field) {
                        echo "<td>".$field."</td>\n";
                    }
                    echo "</tr>\n";
                }
                ?>
            </tbody>
        </table>
        
        <a href="index.php" class="link-button">Tornar a inici</a>
    </div>
</body>
</html>