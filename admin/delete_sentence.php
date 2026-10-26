<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN El Penjat - Eliminar frase</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body id="delete-admin">
    <div class="container">
        <table>
            <thead id="phrases-header">
                <tr>
                    <th>ID</th>
                    <th>Frase</th>
                    <th>Dificultat</th>
                    <th>Acció</th>
                </tr>
            </thead>
            <tbody id="phrases-rows">
                <?php
                $frasesStr = explode("\n", file_get_contents("../sentences_ca.txt"));
                
                foreach ($frasesStr as $i => $frase) {
                    echo "<tr>";
                    echo "<td>" . $i+1 ."</td>";
                    echo "<td>$frase</td>";
                    echo "<td></td>";
                    echo "<td><button class='btnEliminar'>Eliminar</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>