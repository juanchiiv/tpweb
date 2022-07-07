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

    function tieneCapitulos($id_temporada){
        $sql = 'SELECT COUNT(*) AS total FROM episodios e WHERE e.id_temporada_FK = ?';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id_temporada]);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

        return $resultado->total>0;
    }

    function getEpisodios()
    {
        $sql = 'select * from episodios';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        $serie = $sentencia->fetchAll(PDO::FETCH_NAMED);

        return $serie;
    }

    function getTemporadas()
    {
        $sql = 'select * from temporada';
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

    function getTempId($id)
    {
        $sql = 'select * from temporada WHERE id_temporada= ? ';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $temporada = $sentencia->fetch(PDO::FETCH_OBJ);

        return $temporada;
    }

    function getEpisodioId($id)
    {
        $sql = 'select * from episodios WHERE id_episodios= ? ';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $episodio = $sentencia->fetch(PDO::FETCH_OBJ);

        return $episodio;
    }
}
