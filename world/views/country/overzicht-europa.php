<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Table</title>
    <style>
        table {
            border-spacing: 10px;
            width: 50%;
        }
        th, td {
            vertical-align: top;
            padding: 8px;
        }
    </style>
</head>
<body>
    <table border="2px">
        <th>Naam</th>
        <th> Hoofdstad </th>
        <th> Oppervlakte </th>
        <th> Taal </th>
            <?php
                foreach ($countries as $country) {
                    echo "<tr>";
                    //echo "<td>" . $country->countryLanguages ."</td>";
                    echo "<td>" . $country->Name . "</td>";
                    echo "<td><a href='http://localhost:8080/city/view?id=" . $country->hoofdstad->ID . "'>" . $country->hoofdstad->Name . "</a></td>"; 
                    echo "<td>" . number_format($country->SurfaceArea, 0, '.', ' ') . "</td>";
                    //echo "<td>" . $country->countrylanguages[0]->Language . "</td>";
                    ?>
                    <td> <?php
                    $languages = $country->countrylanguages;
                            
                            usort($languages, function($lager, $hoger) {
                                return $hoger->Percentage - $lager->Percentage;
                            }); // Kimi de Jeer

                            foreach ($languages as $taal): ?>
                                <?= $taal->Language ?> (<?= $taal->Percentage ?>%)<br/>
                            <?php endforeach; ?>
                    </td>
                    <?php
                    echo "</tr>"; 
                } // Kimi de Jeer
            ?>
    </table>
</body>
</html>