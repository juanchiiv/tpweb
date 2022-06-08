<?php

class SessionHelper
{

    function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function iniciaSesion($nombre)
    {
        if (!$this->sessionVerify()) {
            session_start();
        }
        $_SESSION["logueado"] = true;
        $_SESSION["username"] = $nombre;
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
