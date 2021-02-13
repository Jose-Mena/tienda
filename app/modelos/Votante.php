<?php

class Votante{
    public function __contruct(){

    }

    public function directivo(){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql="SELECT CONCAT(c.nombre,' ',c.apellido) AS nombre, c.codigo AS documento, c.foto, p.nombre AS programa, s.nombre AS sede
                FROM candidatos c INNER JOIN programas p ON c.programa=p.codigo
                INNER JOIN sedes s ON s.codigo=p.sede
                WHERE c.votacion=1";
              
        $row = $db->table($sql);

        return $row;
    }

    public function bienestar(){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql="SELECT CONCAT(c.nombre,' ',c.apellido) AS nombre, c.codigo AS documento, c.foto, p.nombre AS programa, s.nombre AS sede
                FROM candidatos c INNER JOIN programas p ON c.programa=p.codigo
                INNER JOIN sedes s ON s.codigo=p.sede
                WHERE c.votacion=2";
              
        $row = $db->table($sql);

        return $row;
    }

    public function candidatosvotante($v, $s){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql="SELECT CONCAT(c.nombre,' ',c.apellido) AS nombre, c.codigo AS documento, c.foto, p.nombre AS programa, s.nombre AS sede
                FROM candidatos c INNER JOIN programas p ON c.programa=p.codigo
                INNER JOIN sedes s ON s.codigo=p.sede
                WHERE c.votacion=:v AND s.codigo=:s 
        ";
              
        $params = array(':v'=>$v, ':s'=>$s);
        $row = $db->table($sql,$params);

        return $row;
    }

    public function nombrevotacion($p){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql="SELECT v.nombre, v.codigo
              FROM votaciones v INNER JOIN programas p ON v.codigo=p.votacion
              WHERE p.codigo=:p";
        $params = array(':p'=>$p);

        $row = $db->row($sql,$params);

        return $row;
    }

    public function yahavotado($d){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql="SELECT codigo, nombre, apellido, estado
              FROM votantes
              WHERE codigo=:d";
        $params = array(':d'=>$d);

        $row = $db->row($sql,$params);

        return $row;
    }

    public function validarvotante($d){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql = "SELECT votacion FROM votos WHERE votante = :codigo";
        $params = array(':codigo' => $d);
        $row = $db->table($sql, $params);

        return $row;
    }

    public function generarcodigo($d){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql = "UPDATE codigos SET estado='Sin Validar' WHERE estado='Por Validar' AND votante=:d";
        $params = array(':d' => $d);
        $db->row($sql, $params);

        $codigo = $db->generarCodigo();
        $f=$db->datetimeNow();
        $sql = "INSERT INTO codigos (votante, codigo, fecha, estado) VALUES (:d,:codigo,:f, 'Por Validar')RETURNING id, codigo";
        $params = array(':d'=>$d, ':codigo' => $codigo, ':f'=>$f);
        $row = $db->row($sql, $params);

        return $row;
    }

    public function validarcodigo($d, $c){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql = "UPDATE codigos SET estado=:e WHERE votante=:d AND codigo=:c RETURNING id, codigo";
        $params = array(':e'=>'Ingreso', ':d' => $d, ':c'=>$c);
        $row = $db->row($sql, $params);

        return $row;
    }

    public function votar($votante, $votacion, $candidato){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql = "UPDATE votantes SET estado='Concluido' WHERE codigo=:d AND estado='Pendiente' RETURNING codigo";
        $params = array(':d' => $votante);
        $row = $db->row($sql, $params);

        $sql = "INSERT INTO votos (votante, votacion, voto) VALUES (:v, :vo, :c) RETURNING votante, votacion, voto";
        $params = array(':v'=>$votante, ':vo'=>$votacion, ':c'=>$candidato);
        $row = $db->row($sql, $params);

        return $row;
    }

    public function guardarvotante($documento, $nombre, $apellido, $programa, $emailp, $emaili){
        require_once RUTA_APP.'/config/PDOConn.php';
        $db = new db();

        $sql = "INSERT INTO votantes (codigo, nombre, apellido, programa, emaili, emailp, estado) VALUES (:c, :n, :a, :p, :ei, :ep, 'Pendiente') RETURNING codigo";
        $params = array(':c'=>$documento, ':n'=>$nombre, ':a'=>$apellido, ':p'=>$programa, ':ei'=>$emailp, ':ep'=>$emaili);
        $row = $db->row($sql, $params);

        return $row;
    }
}

?>