<?php
require_once 'libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class SeriesView
{


    function renderSeries($series, $logueado, $temporadas, $rol = null)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);
        $plantilla->assign('temporadas', $temporadas);
        $plantilla->assign('rol', $rol);

        $plantilla->display('templates/serie.tpl');
    }

    function renderTempo($series, $logueado, $rol = null)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);
        $plantilla->assign('rol', $rol);


        $plantilla->display('templates/tempo.tpl');
    }

    function renderHome($logueado, $rol = null)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('rol', $rol);

        $plantilla->display('templates/home.tpl');
    }

    function renderEpiTemp($series, $logueado, $temporadas, $rol = null)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);
        $plantilla->assign('temporadas', $temporadas);
        $plantilla->assign('rol', $rol);

        $plantilla->display('templates/serie.tpl');
    }

    function renderEpisodio($episodio, $logueado, $temporadas, $rol = null)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('episodio', $episodio);
        $plantilla->assign('temporadas', $temporadas);
        $plantilla->assign('rol', $rol);

        $plantilla->display('templates/episodio.tpl');
    }


}
