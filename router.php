<?php
    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

    require_once('controllers/seriesControler.php');
    require_once('controllers/loginControler.php');
    
  
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; 
    }

    
    $params = explode('/', $action);
    
    // determina que camino seguir según la acción
    switch ($params[0]) {
       
        case 'home': 
           $seriesControler = new seriesController();
           $seriesControler->showHome();
        case 'episodios': 
            $seriesControler = new seriesController();
            $seriesControler->showEpisodios();
        case 'temporadas': 
            $seriesControler = new seriesController();
            $seriesControler->showTemporadas();
        case 'login': 
            $loginControler = new loginController();
            $loginControler->showLogin();
        default: 
            echo('404 Page not found'); 
            break;
    }
