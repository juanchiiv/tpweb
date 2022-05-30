<?php

class seriesModel{

    private $db;

    function __construct(){

        $user = 'root';
        $pass = '';
        $dbname = 'todo'; /*cambiar nombre base de datos*/
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
    }


    function getSerie(){
        $sql = 'select * from serie '; /*cambiar nombre de tabla*/ 
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        $serie = $sentencia->fetchAll(PDO::FETCH_NAMED);

        return $serie;
    }

}
