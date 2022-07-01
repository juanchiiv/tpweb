<?php
require_once 'models/userModel.php';
require_once 'views/loginView.php';
require_once 'helpers/sessionHelper.php';
require_once 'views/seriesView.php';

class LoginController
{
    private $logView;
    private $model;
    private $helper;
    private $view;


    function __construct()
    {
        $this->logView = new LoginView();
        $this->model = new UserModel();
        $this->helper = new SessionHelper();
        $this->view = new SeriesView();
    }
    function showLogin()
    {
        $logueado = $this->helper->checkUser();
        $this->logView->renderLogin($logueado);
    }

    function showRegistro()
    {
        $logueado = $this->helper->checkUser();
        $this->logView->renderRegistro($logueado);
    }

    function loguear()
    {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $logueado = $this->helper->checkUser();
            $mensaje = "Complete los campos";
            $this->logView->renderError($logueado, $mensaje);
            die();
        }

        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];
        $user = $this->model->loguear($userEmail);

        //Si el usuario existe y las contraseñas coinciden
        if ($user && password_verify($userPassword, ($user->password))) {
            $this->helper->iniciaSesion($user->rol);
            $logueado = $this->helper->checkUser();
            $this->view->renderHome($logueado, $user->rol);
        } else {
            $logueado = $this->helper->checkUser();
            $mensaje = "Usuario o contraseña invalidos";
            $this->logView->renderError($logueado, $mensaje);
        }
    }

    function registrar()
    {
        if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['password'])) {
            $logueado = $this->helper->checkUser();
            $mensaje = "Complete los campos";
            $this->logView->renderError($logueado, $mensaje);
            die();
        }
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $clave = $_POST['password'];
        $rol = 'usuario';
        $check = $this->model->getUserEmail($email);
        if ($check[0] > 0) {
            $logueado = $this->helper->checkUser();
            $mensaje = "El usuario ya existe";
            $this->logView->renderError($logueado, $mensaje);
        } else {
            $userPassword = password_hash($clave, PASSWORD_BCRYPT);
            $this->model->registrar($nombre, $email, $rol, $userPassword);
            $this->helper->iniciaSesion($nombre);
            $logueado = $this->helper->checkUser();
            $rol = $_SESSION['rol'];
            $this->view->renderHome($logueado, $rol);
        }
    }


    function logout()
    {
        $this->helper->cerrarSesion();
        header('location:' . BASE_URL . 'home');
    }
}
