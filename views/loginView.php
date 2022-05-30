<?php
require_once ('smarty/libs/Smarty.class.php');

class loginView {
   
    function renderLogin(){
        $plantilla = new Smarty();

        $plantilla->assign('BASE_URL', BASE_URL);
       
        
        $plantilla->display('templates/login.tpl');
    }
   
    
}