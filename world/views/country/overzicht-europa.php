<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
        tr{
            border: 1px solid black;
        }
        td{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>

<tr>
<th>Naam</th>
<th></th>
<th>Hoofdstad</th>
<th></th>
<th>Oppervlakte</th>
<th></th>
<th>Taal</th>
</tr>
        <?php
        foreach ($countries as $country) {

            echo "<tr>";
            echo "<td>" . $country->Name . "<td>";
            echo "<td><a href='http://localhost:8080/city/view?id=" . $country->hoofdstad->ID . "'>" . $country->hoofdstad->Name. "</a><td>";
            echo "<td>" . $country->SurfaceArea . "<td>";
            //echo "<td>" . $country->countrylanguages[0]->Language . "<td>";
            ?>
            <td>
            <?php foreach ($country->countrylanguages as $taal): ?>
                <?= $taal->Language ?> (<?= $taal->Percentage ?>%)<br/>
            <?php endforeach; ?>
            </td>
            <?php
            echo "</tr>"; 
        }
        //Kimi de Jeer
        ?>
    </table>
</body>

</html>