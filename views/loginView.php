<?php
require_once 'libs/Smarty.class.php';

class LoginView
{

    function renderLogin($logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('logueado', $logueado);

        $plantilla->assign('BASE_URL', BASE_URL);



        $plantilla->display('templates/login.tpl');
    }

    function renderRegistro($logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('BASE_URL', BASE_URL);

        $plantilla->display('templates/registro.tpl');
    }

    function renderError($logueado, $mensaje)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('mensaje', $mensaje);

        $plantilla->display('templates/error.tpl');
    }
}
