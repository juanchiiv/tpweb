<?php
require_once 'helpers/sessionhelper.php';

class UserModel{

    private $db;
    private $helper;

    function __construct(){

        $user = 'root';
        $pass = '';
        $dbname = 'ahs'; /*cambiar nombre base de datos*/
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
        $this->helper = new SessionHelper();
    }

   

    function loguear(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $userEmail=$_POST['email'];
            $userPassword=$_POST['password'];
            $query = $db->prepare('SELECT * FROM users WHERE email = ?');
            $query->execute([$userEmail]);
            $user = $query->fetch(PDO::FETCH_OBJ);
     
            //Si el usuario existe y las contraseñas coinciden
            if($user && password_verify($userPassword,($user->password))){
                $this->SessionHelper->iniciaSesion($user->nombre);
               header('location: home');
                
            }else{
                echo "Acceso denegado";
            }
     
       }
    }

    function agregaEpisod(){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $audiencia= $_POST['audiencia'];
        $temporada= $_POST['temporada'];
        $sql = "INSERT INTO episodios (nombre, descripcion, audiencia, temporada ) 
                VALUES (?, ?, ?, ?)";
    
        
    
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$nombre, $descripcion, $audiencia, $temporada]);
        
    }

}
