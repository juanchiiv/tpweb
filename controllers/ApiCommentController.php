<?php
require_once 'models/userModel.php';
require_once 'views/ApiView';

class ApiCommentController extends ApiController
{
    private $model;
    private $view;
    public function __construct()
    {
        parent::__construct();
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

    public function agregarComentario($params = []) {
        // devuelve el objeto JSON enviado por POST     
         $body = $this->getData();
 
         // inserta el comentario
         $comentario = $body->comentario;
         $puntuacion = $body->puntuacion;
         $comentario = $this->model->guardarComentario($comentario, $puntuacion);
    }

    public function borrarComentario($params = [])
    {
        $comentario_id = $params[':ID'];
        $comentario = $this->model->getComments($comentario_id);

        if ($comentario) {
            $this->model->borrarComentario($comentario_id);
            $this->view->response("comentario id=$comentario_id eliminada con éxito", 200);
        } else
            $this->view->response("comentario id=$comentario_id not found", 404);
    }

    public function modificarComentario($params = []) {
        $comentario_id = $params[':ID'];
        $comentario = $this->model->getComments($comentario_id);

        if ($comentario) {
            $body = $this->getData();
            $comentario = $body->comentario;
            $puntuacion = $body->puntuacion;
            $comentario = $this->model->modificarComentario($comentario_id, $comentario, $puntuacion);
            $this->view->response("comentario id=$comentario_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("comentario id=$comentario_id not found", 404);
    }
}
