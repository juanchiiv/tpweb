<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class SeriesView
{


    function renderSeries($series, $logueado, $temporadas)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);
        $plantilla->assign('temporadas', $temporadas);

        $plantilla->display('templates/serie.tpl');
    }

    function renderTempo($series, $logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);


        $plantilla->display('templates/tempo.tpl');
    }

    function renderHome($logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);


        $plantilla->display('templates/home.tpl');
    }

    function renderEpiTemp($series, $logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);

        $plantilla->display('templates/serie.tpl');
    }
}
