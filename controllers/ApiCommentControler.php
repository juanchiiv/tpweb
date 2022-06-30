<?php
require_once 'models/userModel.php';
require_once 'views/ApiView';

class TareasApiController
{
    private $model;
    private $view;
    public function __construct()
    {
        $this->model = new userModel();
        $this->view = new APIView();
    }

    function get($params = [])
    {
        if (empty($params)) {
            $comments = 'comentarios';
            $comentarios = $this->model->getComments($comments);
            return $this->view->response($comentarios, 200);
        } else {
            $comentario = $this->model->getComments($params[":ID"]);
            if (!empty($comentario)) {
                return $this->view->response($comentario, 200);
            }
        }
    }
}
