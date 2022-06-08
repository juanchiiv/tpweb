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

    function borrarEpisod($id)
    {
        $sql = "DELETE FROM episodios WHERE id_episodios = ?";
    
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$id]);
    }

    function modificarEpisod()
    {
        
    }
}
