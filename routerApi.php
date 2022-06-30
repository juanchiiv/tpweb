<?php
require_once 'libs/Router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'obtenerComentarios');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'crearComentario');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'obtenerComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'borrarComentario');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'guardarComentario');
$router->addRoute('comentarios/:ID', 'PUT', 'ApiCommentController', 'modificarComentario');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
