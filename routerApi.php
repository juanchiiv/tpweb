<?php
require_once 'libs/Router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'crearComentario');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getComents');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'borrarComentario');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'guardarComentario');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
