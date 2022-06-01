<?php

class seriesModel{

    private $db;

    function __construct(){

        $user = 'root';
        $pass = '';
        $dbname = 'ahs'; /*cambiar nombre base de datos*/
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
    }


    function getSerie($pedido){
        $sql = 'select * from '. $pedido   ; /*cambiar nombre de tabla*/ 
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        $serie = $sentencia->fetch(PDO::FETCH_OBJET);

        return $serie;
    }

}
