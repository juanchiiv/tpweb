<?php

class userModel{

    private $db;

    function __construct(){

        $user = 'root';
        $pass = '';
        $dbname = 'todo'; /*cambiar nombre base de datos*/
        $host = 'localhost';
        $port = '3306';

        $this->db  = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
    }

    function registrarUser(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $userEmail=$_POST['email'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);
     
            //Guardo el nuevo usuario en la base de datos
            $db = new PDO('mysql:host=localhost;'.'dbname=ejemploHashing;charset=utf8', 'root', '');
            $query = $db->prepare('INSERT INTO users (email, password) VALUES (? , ?)');
            $query->execute([$userEmail,$userPassword]);
          
        }
     
    }

    function loginUser(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $userEmail=$_POST['email'];
            $userPassword=$_POST['password'];
            //Obtengo el usuario de la base de datos
            $db = new PDO('mysql:host=localhost;'.'dbname=ejemploHashing;charset=utf8', 'root', '');
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
