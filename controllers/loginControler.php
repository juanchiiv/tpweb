<?php
    require_once 'models/userModel.php';
    require_once 'views/loginView.php';
    require_once 'helpers/sessionHelper.php';

    class loginController {
        private $view;
        private $model;
        private $helper;
        

        function __construct (){
            $this->view = new loginView();
            $this->Model = new userModel();
            
        }
        function showLogin(){
            $this->view->renderLogin();
        }

        function loguear(){
            $this->model->loguear();

        }

        function logout(){
            $this->helper->cerraSesion();
        }

    }