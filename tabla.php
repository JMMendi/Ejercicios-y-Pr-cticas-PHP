<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $num1 = 15;
    $num2 = 1;

    echo "<table border=2 align=center cellpadding=4 cellspacing=4>"; //Para hacer cosas de html, usa el echo y hazlo poco a poco
    while ($num2 <= $num1) {
        echo "<tr>";
        echo "<td>" . $num1 . "</td>";
        echo "<td>X</td>";
        echo "<td>" . $num2 . "</td>";
        echo "<td>=</td>";
        echo "<td>" . $num1 * $num2 . "</td>";
        echo "</tr>";
        $num2++;
    }
    echo "</table>";

    // Practica haciendolo con otros bucles si eso :P

    ?>

    </hr>
    <table border=3 align=center cellpadding=5 cellspacing=5>
        <?php
        $num = 8;
        for ($i = 1; $i <= $num; $i++) {
            $multiplicacion = $i * $num;
            echo <<< TXT
            <tr>
                <td>$num</td>
                <td>X</td>
                <td>$i</td>
                <td>=</td>
                <td>$multiplicacion</td>
            </tr>
        TXT;
        }
        ?>
    </table>

</body>

</html>