<?php 
    require_once 'models/userModel.php';
    require_once 'views/userView.php';
    require_once 'helpers/sessionHelper.php';

    class UserController{
        private $view;
        private $model;
        private $helper;

        function __construct ($logueado){
            $this->view = new UserView();
            $this->model = new UserModel();
            $this->helper = $logueado;
           
        }

        function renderAbm($logueado){
            $this->view->renderAbm($logueado);
        }

        function agregarEpisod(){
            $this->model->agregaEpisod();
        }

    
    
    }