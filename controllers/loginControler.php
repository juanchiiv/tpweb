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
        $this->view= new SeriesView();
    }
    function showLogin()
    {
        $this->logView->renderLogin();
    }

    function loguear()
    {
        if (empty($_POST['email']) || empty($_POST['password'])) {

            echo "no llega";
            die();
        }

        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];
        $user = $this->model->loguear($userEmail);

        //Si el usuario existe y las contraseñas coinciden
        if ($user && password_verify($userPassword, ($user->password))) {
            $this->helper->iniciaSesion($user->nombre);
            $logueado= $this->helper->sessionVerify();
            $this->view->renderHome($logueado);
        } else {
            echo "Usuario o contraseña incorrecta";
        }
    }

    function logout()
    {
        $this->helper->cerrarSesion();
    }
}
