<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class SeriesView
{


    function renderSeries($pedido, $series, $logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('series', $series);
        if ($pedido == 'temporada') {
            $plantilla->display('templates/tempo.tpl');
        } else {
            $plantilla->display('templates/serie.tpl');
        }
    }

    function renderHome($logueado)
    {
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);


        $plantilla->display('templates/home.tpl');
    }
}
