**Tres en raya**

Esta solución fue hecha en PHP, haciendo uso de Base de datos Mysql

Se debe crear una tabla llamada `tresenraya` y luego importar el dump anexo

Para la interacción con la BD se usó PDO.

En la BD existen dos tablas una llamada `players` y otra `board`

En la tabla `players` se almacena el turno de jugador (Jugador 1 o 2) asi como se verifica si ganó la partida o no.
Para almacenar los turnos, se tienen las columnas `playerOneTurn` y `playerTwoTurn` ambas de tipo bool.
Para almacenar al ganador, se tienen las columnas `playerOneWin` y `playerTwoWin` ambas de tipo bool.

En la tabla `board` se almacena las posiciones de la matriz 3x3 asi como su valor actual.
Las columnas están nombradas como `pos` seguido del número de casilla correspondiente, va del 1 al 9 para identificar los 9 recuadros.
Dependiendo de la casilla a la que se ha hecho click, en la BD se actualiza la posición con el valor `X` o `O`

Se ha generado una clase llamada `tresEnRaya` sobre la cual se crearon los métodos necesarios para llevar a cabo el juego, desde ahí, dependiendo de los casos se hacen las actualizaciones de las tablas según como vaya el juego