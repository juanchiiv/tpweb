<?php
require_once 'smarty/libs/Smarty.class.php';

class LoginView
{

    function renderLogin($logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('logueado', $logueado);

        $plantilla->assign('BASE_URL', BASE_URL);



        $plantilla->display('templates/login.tpl');
    }
}
