<?php

require_once 'api/ApiView.php';
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
        $comentarios = $this->model->getComents($params[":ID"]);
        return $this->view->response($comentarios, 200);
    }

    /*function getComents($params = [])
    {   
        $orden = $params[":ORDER"];
        $id = $params[":ID"];
        if ($orden == 1){
        $comentarios = $this->model->getComentsOrderAsc();
        }else{
            $comentarios = $this->model->getComentsOrderDes();
        }
        return $this->view->response($comentarios, 200);
    }
    */
    function agregarComentario($params = [])
    {
        // devuelve el objeto JSON enviado por POST     
        $body = $this->getData();

        // inserta el comentario
        $comentario = $body->comentario;
        $puntuacion = $body->puntuacion;
        $idUser = $body->id_usuario;
        $idEpi = $body->id_episodio;
        $exitosa = $this->model->guardarComentario($comentario, $puntuacion, $idUser, $idEpi);

        if ($exitosa)
            $this->view->response($body, 200);
        else {
            $this->view->response(null, 404);
        }
    }

    function borrarComentario($params = [])
    {
        $comentario_id = $params[':ID'];
        $comentario = $this->model->getComentByIdComent($comentario_id);
        if ($comentario) {
            $this->model->borrarComentario($comentario_id);
            $this->view->response("comentario id=$comentario_id eliminada con éxito", 200);
        } else
            $this->view->response("comentario id=$comentario_id not found", 404);
    }
}
