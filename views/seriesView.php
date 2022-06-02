<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class SeriesView {
   
   
    function renderSeries($series){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('series', $series);
        
        $plantilla->display('templates/serie.tpl');
       
    }

    function renderHome(){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
       
        
        $plantilla->display('templates/home.tpl');
    }
}