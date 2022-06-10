<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class UserView
{




    function renderEditEpi($id)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('id', $id);



        $plantilla->display('templates/editEpi.tpl');
    }

    function renderEditTemp($id)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('id', $id);

        $plantilla->display('templates/editTemp.tpl');
    }

    function renderError($logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->display('templates/userError.tpl');
    }
}
