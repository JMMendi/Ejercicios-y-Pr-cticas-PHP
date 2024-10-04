<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // if & if else

    $num1 =  56;
    $num2 = 56;

    // ordenar de menor a mayor --> 12, 56
    if ($num1 < $num2) {
        echo "Los números ordenados son: $num1 , $num2";
    } elseif ($num1 === $num2) {
        echo "Los números son iguales: $num2 , $num1"; 
    } else {
        echo "Los números ordenados son: $num2 , $num1";
    }

    //operadores lógicos -> && || ! == ===
    $numero1 = 100;
    $numero2 = "100";
    if($numero1 === $numero2) {
        echo "<br>Los números son iguales";
    } else {
        echo "<br>Los números no son iguales";
    }

    // Bucles! for, do...while, while
    for ($i = 0; $i <= 10; $i++) {
        echo "<br>$i";
    }

    // ++$num != $num++ recuerda que no es lo mismo
    echo "<hr>";
    $var = 56;
    echo ++$var."<br>";
    echo $var."<br>"; // En este caso, se actualiza la variable aunque sea un echo/print
    // += *= -= /=    ó    .= 
    $numero3 = 100;
    $numero3 += 50; // lo mismo que $numero3 = $numero3 + 50;

    $nombre = "Pepe";
    echo "<br> $nombre";
    $nombre.=" Gutierrez"; // es como hacer $nombre = $nombre." Guiterrez";
    echo "<br> $nombre";

    echo "<hr>";
    // Operador ternario (oh no™)
    $pass = "Secreto";
    if($pass == "Secreto") {
        echo "<br> Login correcto";
    } else {
        echo "<br> Login incorrecto";
    }

    echo "<br>";
    echo ($pass=="Secreto" ? "Login Correcto" : "Login Incorrecto"); // (comprobacion) ? Si es correcto hago esto : Si no es correcto hago esto;

    $operacion="sumar";
    $num1=90;
    $num2=100;
    $valor =($operacion == "sumar") ? $num1+$num2 : $num1-$num2;
    echo "<br> El valor es $valor";

    // bucle while do_while

    echo "<hr>";
    $num1 = 10;
    do {
        echo "$num1 <br>";
        $num1--;
    } while ($num1 > 0);

    $inicio = 0;
    while($inicio < 10) {
        echo "$inicio <br>";
        $inicio++;
    }

    ?>
</body>
</html>