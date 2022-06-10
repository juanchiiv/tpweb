<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class UserView
{




    function renderEditEpi()
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);



        $plantilla->display('templates/editEpi.tpl');
    }

    function renderEditTemp()
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);

        $plantilla->display('templates/editTemp.tpl');
    }

    function renderError($logueado){
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->display('templates/userError.tpl');
    }
}
