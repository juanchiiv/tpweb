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
    case 'agregar':
        $userControler->agregarEpisod();
        $seriesControler->showEpisodios();
        break;
    case 'borrar':
        $userControler->borrarEpisod($params[1]);
        $seriesControler->showEpisodios();
        break;  
    default:
        echo ('404 Page not found');
        break;
}
