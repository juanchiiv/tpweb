<?php
require_once 'models/userModel.php';
require_once 'views/userView.php';
require_once 'helpers/sessionHelper.php';

class UserController
{
    private $view;
    private $model;
    private $helper;

    function __construct()
    {
        $this->view = new UserView();
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

    function agregarTemp()
    {
        $id_temporada = $_POST['id_temporada'];
        $nombre_temporada = $_POST['nombre_temporada'];

        $this->model->agregaTemp($id_temporada, $nombre_temporada);
    }

    function borrarEpisod($id)
    {
        $this->model->borrarEpisod($id);
        
    }

    function borrarTemp($id)
    {
        $this->model->borrarTemp($id);
        
    }

    function modificarEpisod($id)
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $audiencia = $_POST['audiencia'];
        
        $this->model->modificarEpisod($id, $nombre, $descripcion, $audiencia);
    }

    function showEditEpi(){
        $this->view->renderEditEpi();
    }

    function showEditTemp(){
        $this->view->renderEditTemp();
    }

    function modificarTemp($id)
    {
        $numero = $_POST['id_temporada'];
        $nombre = $_POST['nombre_temporda'];
        
        
        $this->model->modificarTemp($id, $numero, $nombre);
    }
}
