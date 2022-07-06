<?php

class SessionHelper
{

    function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function iniciaSesion($rol)
    {
        if (!$this->sessionVerify()) {
            session_start();
        }
        $_SESSION["logueado"] = true;
        $_SESSION["rol"] = $rol;
    }

    function getRol()
    {
        if(!$this->sessionVerify()){
            session_start();
        }
        if(isset ($_SESSION["rol"]))
        return $_SESSION["rol"];
        else{return null;}
    }

    function sessionVerify()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            return true;
        }
        return false;
    }

    function checkUser()
    {
        if ($this->sessionVerify()) {
            if (isset($_SESSION["logueado"]) && $_SESSION["logueado"]) {
                return true;
            }
        }
        return false;
    }


    function cerrarSesion()
    {
        if ($this->sessionVerify()) {
            session_destroy();
        }
    }
}
