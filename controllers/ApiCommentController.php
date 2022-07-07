<?php

require_once 'views/ApiView';
require_once 'models/comentModel.php';

class ApiCommentController
{
    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model = new ComentModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }

    function getComents($params = [])
    {
        if (empty($params)) {
            $comentarios = $this->model->getComents();
            return $this->view->response($comentarios, 200);
        } else {
            $comentario = $this->model->getComents($params[":ID"]);
            if (!empty($comentario)) {
                return $this->view->response($comentario, 200);
            }else {
                $error = "No hay comentarios";
                return $this->view->response($error, 404);
            }
        }
    }

    function agregarComentario($params = [])
    {
        // devuelve el objeto JSON enviado por POST     
        $body = $this->getData();

        // inserta el comentario
        $comentario = $body->comentario;
        $puntuacion = $body->puntuacion;
        $idUser = $body->id_usuario;
        $idEpi = $body->i_episodio;
        $comentario = $this->model->guardarComentario($comentario, $puntuacion, $idUser, $idEpi);
    }

    function borrarComentario($params = [])
    {
        $comentario_id = $params[':ID'];
        $comentario = $this->model->getComents($comentario_id);

        if ($comentario) {
            $this->model->borrarComentario($comentario_id);
            $this->view->response("comentario id=$comentario_id eliminada con éxito", 200);
        } else
            $this->view->response("comentario id=$comentario_id not found", 404);
    }

}
