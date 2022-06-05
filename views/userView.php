<?php
require_once 'smarty/libs/Smarty.class.php';
require_once 'helpers/sessionHelper.php';

class UserView {
   
   
    

    function renderAbm(){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('$_SESSION', $_SESSION);
        
        $plantilla->display('templates/userAbm.tpl');
    }
}