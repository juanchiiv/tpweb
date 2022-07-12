<?php



class ComentModel
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

    function guardarComentario($comentario, $puntuacion, $idUser, $ideEpi)
    {
        $sql = 'INSERT INTO comentarios(comentario, puntuacion , id_usuario, id_episodio) VALUES(?, ?, ?, ?)';
        $query = $this->db->prepare($sql);
        return $query->execute([$comentario, $puntuacion, $idUser, $ideEpi]);
    }

    function borrarComentario($id)
    {
        $sql = "DELETE FROM comentarios WHERE id = ?";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
    }

    function getComents($id)
    {
        $sql = 'select * from comentarios WHERE id_episodio = ?';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    function getComentByIdComent($id)
    {
        $sql = 'select * from comentarios WHERE id = ?';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $comentario = $sentencia->fetch(PDO::FETCH_OBJ);

        return $comentario;
    }

    /*function getComentsOrderDes($id)
    {
        $sql = 'select * from comentarios WHERE id = ? ORDER BY puntuacion DESC';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetch(PDO::FETCH_OBJ);

        return $comentarios;
    }

    function getComentsOrderAsc($id)
    {
        $sql = 'select * from comentarios WHERE id = ? ORDER BY puntuacion ASC';
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetch(PDO::FETCH_OBJ);

        return $comentarios;
    }*/
}
