<?php
require_once 'models/userModel.php';
require_once 'views/seriesView.php';
require_once 'helpers/sessionHelper.php';

class UserController
{
    private $view;
    private $model;
    private $helper;

    function __construct()
    {
        $this->view = new SeriesView();
        $this->model = new UserModel();
        $this->helper = new SessionHelper();
    }



    function agregarEpisod()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $audiencia = $_POST['audiencia'];
        $temporada = $_POST['temporada'];

        $this->model->agregaEpisod($nombre, $descripcion, $audiencia, $temporada);
    }

    function borrarEpisod($id)
    {
        $this->model->borrarEpisod($id);
        
    }

    function modificarEpisod()
    {
        $this->model->modificarEpisod();
    }
}
