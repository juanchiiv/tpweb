<?php 
    require_once 'models/userModel.php';
    require_once 'views/userView.php';

    class UserController{
        private $view;
        private $model;

        function __construct (){
            $this->view = new UserView();
            $this->model = new UserModel();
           
        }

        function renderAbm(){
            $this->view->renderAbm();
        }

        function agregarEpisod(){
            $this->model->agregaEpisod();
        }

    
    
    }