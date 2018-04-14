<?php

include_once('connect.php');

class TresEnRaya extends connect {

    public $jugador1;
    public $jugador2;
    public $ganador1;
    public $ganador2;
    public $posiciones;
    public $fin;

    function TresEnRaya(){
        $this->iniciarJuego();
    }

    /**
     * Inicio las variables en la BD
     */
    function iniciarJuego(){
        connect::iniciarVariables();
        connect::iniciarTablero();
    }

    /**
     * Proceso del juego donde se actualizan los valores en la matriz
     * Asi como actualizacion de turno y comprobacion de ganador
     * @param null $pos
     */
    function jugar($pos = null){
        $this->posiciones = connect::validarTablero();
        $this->posiciones = $this->actualizarTableroMostrar($this->posiciones);
        $validateTurn = connect::validarTurno();
        $this->jugador1 = $validateTurn[0]['playerOneTurn'];
        $this->jugador2 = $validateTurn[0]['playerTwoTurn'];
        if ($pos != null) {
            if($validateTurn[0]['playerOneTurn']){
                connect::actualizarTablero($pos,"X");
                connect::actualizarTurno(false, true);
            }elseif($validateTurn[0]['playerTwoTurn']){
                connect::actualizarTablero($pos,"O");
                connect::actualizarTurno(true, false);
            }
        }
        $this->posiciones = connect::validarTablero();
        $this->posiciones = $this->actualizarTableroMostrar($this->posiciones);
        $this->comprobarGanador($this->posiciones);
        $validateWinner = connect::validarGanador();
        $this->ganador1 = $validateWinner[0]['playerOneWin'];
        $this->ganador2 = $validateWinner[0]['playerTwoWin'];
        if($this->ganador1){
            header('Location: ganador.php?win=1');
        }
        if($this->ganador2){
            header('Location: ganador.php?win=2');
        }
    }

    /**
     * Actualizacion de matriz para mostrar
     * @param $posiciones
     * @return array
     */
    function actualizarTableroMostrar($posiciones){
        return array (
            0 => $posiciones[0]['pos1'],
            1 => $posiciones[0]['pos2'],
            2 => $posiciones[0]['pos3'],
            3 => $posiciones[0]['pos4'],
            4 => $posiciones[0]['pos5'],
            5 => $posiciones[0]['pos6'],
            6 => $posiciones[0]['pos7'],
            7 => $posiciones[0]['pos8'],
            8 => $posiciones[0]['pos9']
        );
    }

    /**
     * Validacion de Ganador
     * @param $posiciones
     */
    function comprobarGanador($posiciones){
        if ($posiciones[0] === 'X' &&
            $posiciones[1] === 'X' &&
            $posiciones[2] === 'X') {
            connect::actualizarGanador(true,false);
        } elseif ($posiciones[0] === 'O' &&
            $posiciones[1] === 'O' &&
            $posiciones[2] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[3] === 'X' &&
            $posiciones[4] === 'X' &&
            $posiciones[5] === 'X') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[3] === 'O' &&
            $posiciones[4] === 'O' &&
            $posiciones[5] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[6] === 'X' &&
            $posiciones[7] === 'X' &&
            $posiciones[8] === 'X') {
            connect::actualizarGanador(true,false);
        } elseif ($posiciones[6] === 'O' &&
            $posiciones[7] === 'O' &&
            $posiciones[8] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[0] === 'X' &&
            $posiciones[3] === 'X' &&
            $posiciones[6] === 'X') {
            connect::actualizarGanador(true,false);
        } elseif ($posiciones[0] === 'O' &&
            $posiciones[3] === 'O' &&
            $posiciones[6] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[1] === 'X' &&
            $posiciones[4] === 'X' &&
            $posiciones[7] === 'X') {
            connect::actualizarGanador(true,false);
        } elseif ($posiciones[1] === 'O' &&
            $posiciones[4] === 'O' &&
            $posiciones[7] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[2] === 'X' &&
            $posiciones[5] === 'X' &&
            $posiciones[8] === 'X') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[2] === 'O' &&
            $posiciones[5] === 'O' &&
            $posiciones[8] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[0] === 'X' &&
            $posiciones[4] === 'X' &&
            $posiciones[8] === 'X') {
            connect::actualizarGanador(true,false);
        } elseif ($posiciones[0] === 'O' &&
            $posiciones[4] === 'O' &&
            $posiciones[8] === 'O') {
            connect::actualizarGanador(false,true);
        } elseif ($posiciones[2] === 'X' &&
            $posiciones[4] === 'X' &&
            $posiciones[6] === 'X') {
            connect::actualizarGanador(true,false);
        } elseif ($posiciones[2] === 'O' &&
            $posiciones[4] === 'O' &&
            $posiciones[6] === 'O') {
            connect::actualizarGanador(false,true);
        } else {
            $fin = true;
            for ($i=0; $i<9; $i++) {
                if ($posiciones[$i] === 'ø') {
                    $fin = false;
                }
            }
            if ($fin)
                header('Location: ganador.php?win=3', true, 302);
        }
    }

    /**
     * Reiniciar Partida
     */
    function reiniciar(){
        connect::restart();
    }

}
?>
