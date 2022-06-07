<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "controllers/seriesControler.php";
require_once "controllers/loginControler.php";
require_once "controllers/userControler.php";
require_once "helpers/sessionHelper.php";


$seriesControler = new SeriesController();
$loginControler = new LoginController();
$logueado = new SessionHelper();
$userControler = new UserController($logueado);


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}


$params = explode('/', $action);


switch ($params[0]) {

    case 'home':
        $seriesControler->showHome($logueado->sessionVerify());
        break;
    case 'episodios':
        $seriesControler->showEpisodios($logueado->sessionVerify());
        break;
    case 'temporadas':
        $seriesControler->showTemporadas($logueado->sessionVerify());
        break;
    case 'login':
        $loginControler->showLogin($logueado->sessionVerify());
        break;
    case 'loguear':
        $loginControler->loguear($logueado->sessionVerify());
        break;
        $seriesControler->showHome($logueado->sessionVerify());
    case 'logout':
        $loginControler->logout($logueado->sessionVerify());
        break;
    case 'agregar':
        $userControler->agregarEpisod($logueado->sessionVerify());
        break;
    default:
        echo ('404 Page not found');
        break;
}
