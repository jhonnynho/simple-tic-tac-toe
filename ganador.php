<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="STYLESHEET" type="text/css" href="Css.css">
</head>
<body>
<?php
if($_GET['win']==1){
    echo '<h1 class="pj1">Ganador Jugador 1</h1>';
}
if($_GET['win']==2){
    echo '<h1 class="pj2">Ganador Jugador 2</h1>';
}
if($_GET['win']==3){
    echo '<h1 class="pj1">Empate</h1>';
}
?>
<br>
<div id="casillas">
<form method="post" action="sent.php">
<input class="btn" name="reiniciar" type="submit" value="Volver">
</form>
</div>
</body>
</html>
