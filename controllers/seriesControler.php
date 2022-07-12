<?php
require_once 'views/seriesView.php';
require_once 'models/seriesModel.php';



class SeriesController
{
    private $view;
    private $tempoModel;
    private $episodModel;
    private $helper;



    function __construct()
    {
        $this->view = new SeriesView();
        $this->tempoModel = new SeriesModel();
        $this->episodModel = new SeriesModel();
        $this->helper = new SessionHelper();
    }

    function showEpisodios()
    {
        $episodios = $this->episodModel->getEpisodios();
        $temp = $this->tempoModel->getTemporadas();
        $logueado = $this->helper->checkUser();
        $rol = $this->helper->getRol();
        $this->view->renderSeries($episodios, $logueado, $temp, $rol);
    }

    function showTemporadas()
    {
        $temporadas = $this->tempoModel->getTemporadas();
        $logueado = $this->helper->checkUser();
        $rol = $this->helper->getRol();
        $this->view->renderTempo($temporadas, $logueado, $rol);
    }
    function showHome()
    {
        $logueado = $this->helper->checkUser();
        $rol = $this->helper->getRol();
        $this->view->renderHome($logueado, $rol);
    }

    function showEpiTemp($id)
    {
        $episodios = $this->episodModel->getSerieId($id);
        $temporadas = $this->tempoModel->getTemporadas();
        $logueado = $this->helper->checkUser();
        $rol = $this->helper->getRol();
        $this->view->renderEpiTemp($episodios, $logueado, $temporadas, $rol);
    }

    function showEpiInfo($id)
    {
        $episodio = $this->episodModel->getEpisodioId($id);
        $temporada = $this->tempoModel->getTempId($episodio->id_temporada_FK);
        $id_user = $this->helper->getId();
        $logueado = $this->helper->checkUser();
        $rol = $this->helper->getRol();
        $this->view->renderEpisodio($episodio, $logueado, $temporada->nombre_temporada, $rol, $id_user);
    }
}
