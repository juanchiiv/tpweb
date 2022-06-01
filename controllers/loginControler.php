<?php
    require_once 'models/userModel.php';
    require_once 'views/loginView.php';

    class loginController {
        private $view;
        private $model;
        

        function __construct (){
            $this->view = new loginView();
            $this->Model = new userModel();
            
        }
        function showLogin(){
            $this->view->renderLogin();
        }

       

    }