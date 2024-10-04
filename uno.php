<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><center>Página PHP</center></h1>
    <?php
        echo "<b>Hola Mundo</b></br>".PHP_EOL; //el .PHP_EOL sirve para, cuando miras el código fuente, haga saltos de línea y sea más legible
        echo "<i>Línea 2</i></br>";
        echo "<hr>";
        echo 'Hola Mundo';
        // Variables ............
        $num = 12;
        $nombre = "usuario";
        echo "<br>";
        echo "El número es: ".$num. " y el nombre es: ".$nombre; // Para concatenar en php, en vez del + se usa un . 
        echo "<br>";
        echo 'El número es $num'; // las variables se cogen en comillas dobles
        echo "<br>";
        echo "El precio es \$precio \n"; // También para saltos de línea puedes usar un \n . Mejor usar el .PHP_EOL
        echo "<br>";
        echo "El valor de \$num es $num"; // para usar los caracteres especiales usa \ antes del caracter
        // o hacerlo como 'El valor de $num es '.$num
        echo "<br>";
        echo "El nombre es \"$nombre\""; // para poner comillas dobles, se "escapa" con el \" cada vez
        echo "<br>";
        echo 'El nombre es "'.$nombre.'"'; // y así otra manera un tanto liosa
        echo "<br>";
        echo "El nombre es '$nombre'"; // o así pero con comillas simples
        echo "<br>";
        $num1="hola";
        echo "El tipo de \$num1 es: ".gettype($num1);
        echo "<br>";
        $num1=45;
        echo "El tipo de \$num1 es: ".gettype($num1);
        echo "<hr>";

        // Casting
        $nombre = "50";
        echo "El tipo de \$nombre es ".gettype($nombre);
        $valor=$nombre+$num1;
        echo "<br> El valor de \$valor es $valor y el tipo es ".gettype($valor);
        // como no es tipado, puede hacer castings de variables, hasta cierto límite (si no empezase por un número te daría error)
        $valor1="4509"; // prueba a poner AAA4509 y verás el error. si es 4509AAA lo intentará
        $numero = (Int) $valor1;
        echo "<br>";
        echo "El tipo de \$numero es ".gettype($numero);

    ?>
</body>
</html>