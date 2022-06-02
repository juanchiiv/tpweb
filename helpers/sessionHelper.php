<?php

    class SessionHelper {

        function __construct(){

        }

        function iniciaSession($nombre){
            session_start();
            $_SESSION["logueado"]= true;
            $_SESSION["username"]= $nombre;
            header('location: home');
        }

        function sessionVerify(){
            if (isset($_SESSION)&&($_SESSION["logueado"]==true)){
                return true;
            }
            return false;
        }

        function cerrarSesion(){
            session_start();
            session_destroy();
            header ( 'location: home');
        }

    }