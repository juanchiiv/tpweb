<?php
require_once 'helpers/sessionhelper.php';

class UserModel
{

    private $db;
    private $helper;

    function __construct()
    {

        $user = 'root';
        $pass = '';
        $dbname = 'ahs'; /*cambiar nombre base de datos*/
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
        $this->helper = new SessionHelper();
    }



    function loguear($userEmail)
    {

        $query = $this->db->prepare('select * FROM login WHERE email = ?');
        $query->execute([$userEmail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function agregaEpisod($nombre, $descripcion, $audiencia, $temporada)
    {
        
        $sql = 'INSERT INTO episodios (nombre, descripcion, audiencia, id_temporada_FK) 
                VALUES (?, ?, ?, ?)';



        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$nombre, $descripcion, $audiencia, $temporada]);
    }

    function agregaTemp($id_temporada, $nombre_temporada)
    {
        
        $sql = 'INSERT INTO temporada (id_temporada, nombre_temporada) 
                VALUES (?, ?)';



        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id_temporada, $nombre_temporada]);
    }

    function borrarEpisod($id)
    {
        $sql = "DELETE FROM episodios WHERE id_episodios = ?";
    
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
    }

    function borrarTemp($id)
    {
        $sql = "DELETE FROM temporada WHERE id_temporada = ?";
    
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
    }

    function modificarEpisod($id, $nombre, $descripcion, $audiencia)
    {
        $sql = "UPDATE episodio SET nombre = $nombre,
        descripcion = $descripcion,
        audiencia = $audiencia
        updated_at = NOW() WHERE id = ?";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);        
    }

    function modificarTemp($id, $numero, $nombre)
    {
        $sql = "UPDATE temporada SET id_temporada = $numero,
        nombre_temporada = $nombre
        updated_at = NOW() WHERE id = ?";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);        
    }
}
