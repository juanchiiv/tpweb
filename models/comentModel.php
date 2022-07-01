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

    function guardarComentario($comentario, $puntuacion)
    {
        $query = $this->db->prepare('INSERT INTO comentarios(comentario, puntuacion) VALUES(?,0)');
        $query->execute([$comentario, $puntuacion]);
        $query->execute([$comentario, $puntuacion]);

        return $this->db->lastInsertId();
    }

    function borrarComentario($id)
    {
        $sql = "DELETE FROM comentarios WHERE id_episodio = ?";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
    }

    function getComments($pedido)
    {
        $sql = 'select * from ' . $pedido . '';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        $comentarios = $sentencia->fetchAll(PDO::FETCH_NAMED);

        return $comentarios;
    }

    function modificarComentario($id_comentario, $comentario, $puntuacion) {
        $query = $this->db->prepare('UPDATE comentario SET comentario = ? SET puntuacion = 0 WHERE id_comentario = ?');
        $query->execute([$comentario, $puntuacion, $id_comentario]);
    }
}
