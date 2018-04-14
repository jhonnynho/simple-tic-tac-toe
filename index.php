<?php
require_once('tresEnRaya.php');
require_once('connect.php');
$class = new TresEnRaya();

?>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="STYLESHEET" type="text/css" href="Css.css">
</head>
<body>
<div id="casillas">
    <form method="post" action="sent.php">
        <?php
        $class->jugar();

        if ($class->jugador1) {
            echo '<h1 class="pj1">Turno Jugador 1</h1>';
        } else {
            echo '<h1 class="pj2">Turno Jugador 2</h1>';
        }

        $j = 0;
        for ($i=0; $i<=8; $i++) {

            if (isset($class->posiciones) && $class->posiciones[$i] === 'ø') {
                echo '<input class="casilla" name="'.$i.'" type="submit" value="*">';
            } elseif ($class->posiciones[$i] === 'X') {
                echo '<input class="casilla azul" disabled="true" name="'.$i.'" type="submit"  value="'.$class->posiciones[$i].'">';
            } elseif ($class->posiciones[$i] === 'O') {
                echo '<input class="casilla rojo" disabled="true" name="'.$i.'" type="submit" value="'.$class->posiciones[$i].'">';
            }

            $j++;
            if ($j == 3) {
                echo '<br>';
                $j = 0;
            }
        }
        ?>
    </form>

</div>
</body>
</html>