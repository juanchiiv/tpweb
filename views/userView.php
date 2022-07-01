<?php
require_once 'libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class UserView
{

    function renderBorrarTempError($logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);

        $plantilla->display('templates/borrarTemp.tpl');
    }


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

    function renderError($logueado, $mensaje)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('mensaje', $mensaje);
        $plantilla->display('templates/userError.tpl');
    }

    function renderUsuarios($usuarios, $logueado, $rol)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('usuarios', $usuarios);
        $plantilla->assign('rol', $rol);
        $plantilla->display('templates/usuarios.tpl');
    }
}
