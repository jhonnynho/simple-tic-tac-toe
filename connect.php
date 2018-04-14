<?php

class connect{

    function connection(){
        return new PDO('mysql:host=localhost;dbname=tresenraya;charset=utf8mb4', 'root', '');
    }

    /**
     * Se inserta en la tabla players el turno inicial, en este caso del jugador 1
     */
    function iniciarVariables(){
        $playerOneTurn = true;
        $playerTwoTurn = false;
        $playerOneWin = false;
        $playerTwoWin = false;

        $db = $this->connection();

        $query = $db->query('SELECT * FROM players');
        $row_count = $query->rowCount();

        if($row_count==0) {
            $insert = $db->prepare(
                "INSERT INTO players(playerOneTurn,playerTwoTurn,playerOneWin,playerTwoWin) 
             VALUES(:playerOneTurn,:playerTwoTurn,:playerOneWin,:playerTwoWin)
        ");
            $insert->execute(
                array(
                    ':playerOneTurn' => $playerOneTurn,
                    ':playerTwoTurn' => $playerTwoTurn,
                    ':playerOneWin' => $playerOneWin,
                    ':playerTwoWin' => $playerTwoWin
                )
            );
        }
    }

    /**
     * Se inserta en la tabla board los valores iniciales para la matrix 3x3
     */
    function iniciarTablero(){
        $db = $this->connection();

        $query = $db->query('SELECT * FROM board');
        $row_count = $query->rowCount();

        if($row_count==0){
            $insert = $db->prepare(
                "INSERT INTO board(pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9) 
                 VALUES(:pos1,:pos2,:pos3,:pos4,:pos5,:pos6,:pos7,:pos8,:pos9)
            ");
            $insert->execute(
                array(
                    ':pos1' => "ø",
                    ':pos2' => "ø",
                    ':pos3' => "ø",
                    ':pos4' => "ø",
                    ':pos5' => "ø",
                    ':pos6' => "ø",
                    ':pos7' => "ø",
                    ':pos8' => "ø",
                    ':pos9' => "ø",
                )
            );
        }
    }

    /**
     * Verificacion del tablero
     * @return array
     */
    function validarTablero(){
        $db = $this->connection();
        $stmt = $db->query('SELECT * FROM board');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Verificacion del turno
     * @return array
     */
    function validarTurno(){
        $db = $this->connection();
        $stmt = $db->query('SELECT * FROM players');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Verificacion de posible ganador
     * @return array
     */
    function validarGanador(){
        $db = $this->connection();
        $stmt = $db->query('SELECT * FROM players');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Se actualiza el tablero con el valor y posicion correspondiente
     * @param $pos
     * @param $val
     */
    function actualizarTablero($pos, $val){
        $pos = "pos".$pos;
        $db = $this->connection();
        $stmt = $db->prepare("UPDATE board SET $pos=?");
        $stmt->execute(array($val));
    }

    /**
     * Se actualiza el turno del jugador
     * @param $a
     * @param $b
     */
    function actualizarTurno($a,$b){
        $db = $this->connection();
        $stmt = $db->prepare("UPDATE players SET playerOneTurn=?, playerTwoTurn=?");
        $stmt->execute(array($a, $b));
    }

    /**
     * Se actualiza el ganador
     * @param $player1
     * @param $player2
     */
    function actualizarGanador($player1, $player2){
        $db = $this->connection();
        $stmt = $db->prepare("UPDATE players SET playerOneWin=?, playerTwoWin=?");
        $stmt->execute(array($player1, $player2));
    }

    /**
     * Se eliminan los datos de la tabla para iniciar nuevo juego
     */
    function restart(){
        $db = $this->connection();
        $stmt = $db->prepare("DELETE FROM players");
        $stmt->execute();
        $stmt = $db->prepare("DELETE FROM board");
        $stmt->execute();
    }

}
