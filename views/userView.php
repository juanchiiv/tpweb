<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class UserView {
   
   
    

    function renderAbm($logueado){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado',$logueado);
        
        $plantilla->display('templates/userAbm.tpl');
    }
}