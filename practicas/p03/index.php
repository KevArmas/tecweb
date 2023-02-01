<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">
<head>
    <title> Practica3 </title>
</head>
<body>
    <h1>Inciso 1</h1>
    <p> 1. Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
    <?php
    $_myvar = 'hola';
    echo '$_myvar es correcta <br>';

    $_7var = 11;
    echo '$_myvar es correcta <br>';

    //myvar = 'hola';
    echo 'myvar es incorrecta debido a que le falta el signo de $ al inicio de la variable<br>';

    $myvar = 'Prueba';
    echo '$_myvar es correcta <br>';

    $var7 = 33;
    echo '$_myvar es correcta <br>';


    ?>
</body>
</html>