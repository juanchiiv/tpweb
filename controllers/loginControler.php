<?php
    require_once 'models/userModel.php';
    require_once 'views/loginView.php';
    require_once 'helpers/sessionHelper.php';

    class LoginController {
        private $view;
        private $model;
        private $helper;
        

        function __construct (){
            $this->view = new LoginView();
            $this->model = new UserModel();
            $this->helper = new SessionHelper();
        }
        function showLogin(){
            $this->view->renderLogin();
        }

        function loguear(){
            $this->model->loguear();
            

        }

        function logout(){
            $this->helper->cerrarSesion();
        }

    }