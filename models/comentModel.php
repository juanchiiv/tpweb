<?php
require_once 'helpers/sessionhelper.php';

class ComentModel
{

    private $db;
    private $helper;

    function __construct()
    {

        $user = 'root';
        $pass = '';
        $dbname = 'ahs';
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
        $this->helper = new SessionHelper();
    }

    function guardarComentario($comentario, $puntuacion, $idUser, $ideEpi)
    {
        $query = $this->db->prepare('INSERT INTO comentarios(comentario, puntuacion , id_usuario, id_episodio) VALUES(?, ?)');
        $query->execute([$comentario, $puntuacion, $idUser, $ideEpi]);
       
    }

    function borrarComentario($id)
    {
        $sql = "DELETE FROM comentarios WHERE id_episodio = ?";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
    }

    function getComents($id = null)
    {
        $sql = 'select * from comentarios WHERE id_episodio = ?';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

}
