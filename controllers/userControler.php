<?php
require_once 'models/userModel.php';
require_once 'views/userView.php';
require_once 'helpers/sessionHelper.php';
require_once 'models/seriesModel.php';

class UserController
{
    private $view;
    private $model;
    private $helper;
    private $serieModel;

    function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->helper = new SessionHelper();
        $this->serieModel = new SeriesModel();
    }



    function agregarEpisod()
    {
        if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['audiencia']) || empty($_POST['temporada'])) {
            $logueado = $this->helper->checkUser();
            $this->view->renderError($logueado);
            die();
        }
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $audiencia = $_POST['audiencia'];
        $temporada = $_POST['temporada'];

        $this->model->agregaEpisod($nombre, $descripcion, $audiencia, $temporada);
    }

    function agregarTemp()
    {
        if (empty($_POST['id_temporada']) || empty($_POST['nombre_temporada'])) {
            $logueado = $this->helper->checkUser();
            $this->view->renderError($logueado);
            die();
        }
        $id_temporada = $_POST['id_temporada'];
        $nombre_temporada = $_POST['nombre_temporada'];

        $this->model->agregaTemp($id_temporada, $nombre_temporada);
    }

    function borrarEpisod($id)
    {
        $this->model->borrarEpisod($id);
        header('location:' . BASE_URL . 'episodios');
    }

    function borrarTemp($id)
    {
        if (!$this->serieModel->tieneCapitulos($id)) {
            $this->model->borrarTemp($id);
            header('location:' . BASE_URL . 'temporadas');
        } else {
            $logueado = $this->helper->checkUser();
            $this->view->renderBorrarTempError($logueado);
        }
    }

    function modificarEpisod()
    {
        if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['audiencia']) || empty($_POST['temporada'])) {
            $logueado = $this->helper->checkUser();
            $this->view->renderError($logueado);
            die();
        }
        $id = $_POST['id_episodios'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $audiencia = $_POST['audiencia'];
        $temporada = $_POST['temporada'];

        $this->model->modificarEpisod($id, $nombre, $descripcion, $audiencia, $temporada);

        header('location:' . BASE_URL . 'episodios');
    }

    function showEditEpi($id)
    {
        $tempo = 'temporada';
        $temp = $this->serieModel->getSerie($tempo);
        $episodio = $this->serieModel->getEpId($id);
        $logueado = $this->helper->checkUser();
        $this->view->renderEditEpi($temp, $logueado, $episodio);
    }

    function showEditTemp($id)
    {
        $temporada = $this->serieModel->getTempId($id);
        $logueado = $this->helper->checkUser();
        $this->view->renderEditTemp($temporada, $logueado);
    }

    function modificarTemp()
    {
        if (empty($_POST['id_temporada']) || empty($_POST['nombre_temporada'])) {
            $logueado = $this->helper->checkUser();
            $this->view->renderError($logueado);
            die();
        }
        $id = $_POST['id_temporada'];
        $nombre = $_POST['nombre_temporada'];

        $this->model->modificarTemp($id, $nombre);

        header("location:" . BASE_URL . "temporadas");
    }
    
}
