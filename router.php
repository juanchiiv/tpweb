<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "controllers/seriesControler.php";
require_once "controllers/loginControler.php";
require_once "controllers/userControler.php";



$seriesControler = new SeriesController();
$loginControler = new LoginController();
$userControler = new UserController();


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}


$params = explode('/', $action);


switch ($params[0]) {

    case 'home':
        $seriesControler->showHome();
        break;
    case 'episodios':
        $seriesControler->showEpisodios();
        break;
    case 'temporadas':
        $seriesControler->showTemporadas();
        break;
    case 'login':
        $loginControler->showLogin();
        break;
    case 'loguear':
        $loginControler->loguear();
        break;
    case 'logout':
        $loginControler->logout();
        break;
    case 'agregarEpisod':
        $userControler->agregarEpisod();
        $seriesControler->showEpisodios();
        break;
    case 'agregarTemp':
        $userControler->agregarTemp();
        $seriesControler->showTemporadas();
        break;
    case 'borrarEpisod':
        $userControler->borrarEpisod($params[1]);
        $seriesControler->showEpisodios();
        break;
    case 'borrarTemp':
        $userControler->borrarTemp($params[1]);
        $seriesControler->showTemporadas();
        break;
    case 'modificarEpi':
        $userControler->showEditEpi();
        break;
    case 'modificarTemp':
        $userControler->showEditTemp();
        break;
    case 'actualizarEpi':
        $userControler->modificarEpisod($params[1]);
        $seriesControler->showEpisodios();
        break;
    case 'actualizarTemp':
        $userControler->modificarTemp($params[1]);
        $seriesControler->showTemporadas();
        break;
    case 'verTemp':
        $seriesControler->showEpiTemp($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}
