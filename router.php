<?php
    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

    require_once "controllers/seriesControler.php";
    require_once "controllers/loginControler.php";
    require_once "controllers/userControler.php";
    require_once "helpers/sessionHelper.php";


    $seriesControler = new SeriesController();
    $loginControler = new LoginController();
    $logueado= new SessionHelper();
    $userControler = new UserController($logueado); 
    
  
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; 
    }

    
    $params = explode('/', $action);
    
    // determina que camino seguir según la acción
    switch ($params[0]) {
       
        case 'home': 
           $seriesControler->showHome($logueado->sessionVerify());
        case 'episodios': 
            $seriesControler->showEpisodios($logueado->sessionVerify());
        case 'temporadas': 
            $seriesControler->showTemporadas($logueado->sessionVerify());
        case 'login':           
            $loginControler->showLogin($logueado->sessionVerify());
        case 'loguear': 
            $loginControler->loguear($logueado->sessionVerify());
        case 'logout': 
            $loginControler->logout($logueado->sessionVerify());
        case 'agregar': 
            $userControler->agregarEpisod($logueado->sessionVerify());
        default: 
            echo('404 Page not found'); 
            break;
    }
