<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>

<tr>
<th>Naam</th>
<th>Oppervlakte</th>
</tr>
        <?php
        foreach ($countries as $country) {

            
            echo "<tr>";
            echo "<td>" . $country->Name . "<td>";
            echo "<td>" . $country->SurfaceArea . "<td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>