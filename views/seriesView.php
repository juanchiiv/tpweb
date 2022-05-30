<?php
require_once ('smarty/libs/Smarty.class.php');

class seriesView {
   
   
    function renderSeries($serie){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('tareas', $serie);
        
        $plantilla->display('templates/serie.tpl');
       
    }

    function renderHome(){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
       
        
        $plantilla->display('templates/serie.tpl');
    }
}