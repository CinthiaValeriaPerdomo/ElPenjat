<?php
    session_start();
    require_once "localization.php";
    setPage("ranking.php");

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
<html lang="<?= getLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("html-title") ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="ranking">
    <div class="container">
        <h1><?= t("title") ?></h1>
        <table>
            <thead id="ranking-header">
                <tr>
                    <th><?= t("th1") ?></th>
                    <th><?= t("th2") ?></th>
                    <th><?= t("th3") ?></th>
                </tr>
            </thead>
            <tbody class="zebra-rows">
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
        
        <a href="index.php" class="link-button"><?= t("link-to-index") ?></a>
    </div>
</body>
</html>