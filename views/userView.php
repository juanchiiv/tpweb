<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class UserView
{




    function renderEditEpi($temporadas, $logueado, $episodio)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('temporadas', $temporadas);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('episodio', $episodio);

        $plantilla->display('templates/editEpi.tpl');
    }

    function renderEditTemp($temporada, $logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('temporada', $temporada);

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
