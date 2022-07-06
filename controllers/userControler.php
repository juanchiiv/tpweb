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
        if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['audiencia']) || empty($_POST['temporada']) || ($_POST['temporada'] == "-- Seleccione --")) {
            $logueado = $this->helper->checkUser();
            $mensaje = "Complete los campos";
            $this->view->renderError($logueado, $mensaje);
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
        if (empty($_POST['nombre_temporada'])) {
            $logueado = $this->helper->checkUser();
            $mensaje = "Complete los campos";
            $this->view->renderError($logueado, $mensaje);
            die();
        }

        $nombre_temporada = $_POST['nombre_temporada'];
        $this->model->agregaTemp($nombre_temporada);
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
            $mensaje = "Complete los campos";
            $this->view->renderError($logueado, $mensaje);
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
        $temp = $this->serieModel->getTemporadas();
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
            $mensaje = "Complete los campos";
            $this->view->renderError($logueado, $mensaje);
            die();
        }
        $id = $_POST['id_temporada'];
        $nombre = $_POST['nombre_temporada'];

        $this->model->modificarTemp($id, $nombre);

        header("location:" . BASE_URL . "temporadas");
    }

    function getUsuarios()
    {
        $usuarios = $this->model->getUsuarios();
        $logueado = $this->helper->checkUser();
        $rol = $this->helper->getRol();
        $this->view->renderUsuarios($usuarios, $logueado, $rol);
    }

    function cambiarRol($id)
    {
        $rol = $this->model->checkRol($id);

        if ($rol->rol == 'usuario') {
            $newRol = 'admin';
        } else {
            $newRol = 'usuario';
        }

        $this->model->cambiarRol($id, $newRol);

        header("location:" . BASE_URL . "usuarios");
    }

    function eliminarUsuario($id)
    {
        $this->model->eliminarUsuario($id);

        header("location:" . BASE_URL . "usuarios");
    }
}
