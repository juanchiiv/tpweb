<?php

    class SessionHelper {

        function __construct(){
            
        }

        function iniciaSession($nombre){ 
            session_start();     
            $_SESSION["logueado"]= true;
            $_SESSION["username"]= $nombre;
            
        }

        function sessionVerify(){
            if (isset($_SESSION)&&($_SESSION["logueado"]==true)){
                return true;
            }
            return false;
        }

        function cerrarSesion(){
            
            session_unset();
            
        }

    }