<?php

class SeriesModel
{

    private $db;

    function __construct()
    {

        $user = 'root';
        $pass = '';
        $dbname = 'ahs';
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
    }


    function getSerie($pedido)
    {
        $sql = 'select * from ' . $pedido . '';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        $serie = $sentencia->fetchAll(PDO::FETCH_NAMED);

        return $serie;
    }

    function getSerieId($id)
    {
        $sql = 'select * from episodios WHERE id_temporada_FK= ? ';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $serie = $sentencia->fetchAll(PDO::FETCH_NAMED);

        return $serie;
    }
}
