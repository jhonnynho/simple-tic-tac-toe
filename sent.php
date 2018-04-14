<?php
require_once('tresEnRaya.php');
require_once('connect.php');

$class = new TresEnRaya();
for ($i=0; $i<=8; $i++) {
    if (isset($_POST[$i])) {
        $class->jugar(++$i);
        header('Location: index.php');
    }
}

if(isset($_POST["reiniciar"])){
    $class->reiniciar();
    header('Location: index.php');
}


