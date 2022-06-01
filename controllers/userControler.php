<?php 
    require_once 'models/userModel.php';
    require_once 'views/userView.php';

    class userControler{
        private $view;
        private $model;

        function __construct (){
            $this->view = new userView();
            $this->model = new userModel();
           
        }

        function registrarUser(){
            
        }
    
    }