<?php

class userModel{

    private $db;

    function __construct(){

        $user = 'root';
        $pass = '';
        $dbname = 'ahs'; /*cambiar nombre base de datos*/
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
    }

   

    function loginUser(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $userEmail=$_POST['email'];
            $userPassword=$_POST['password'];
            //Obtengo el usuario de la base de datos
            $db = new PDO('mysql:host=localhost;'.'dbname=ahs;charset=utf8', 'root', '');
            $query = $db->prepare('SELECT * FROM users WHERE email = ?');
            $query->execute([$userEmail]);
            $user = $query->fetch(PDO::FETCH_OBJ);
     
            //Si el usuario existe y las contraseñas coinciden
            if($user && password_verify($userPassword,($user->password))){
                //Guardo datos en el arreglo de sesion
                $_SESSION["logueado"] = true;
                $_SESSION["username"] = $userEmail;
                var_dump($_SESSION);
                echo "Acceso exitoso";
            }else{
                echo "Acceso denegado";
            }
     
       }
    }

}
