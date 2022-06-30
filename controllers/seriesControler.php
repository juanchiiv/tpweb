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
        $this->view->renderSeries($episodios, $logueado, $temp);
    }

    function showTemporadas()
    {
        $temporadas = $this->tempoModel->getTemporadas();
        $logueado = $this->helper->checkUser();
        $this->view->renderTempo($temporadas, $logueado);
    }
    function showHome()
    {
        $logueado = $this->helper->checkUser();
        $this->view->renderHome($logueado);
    }

    function showEpiTemp($id)
    {
        $episodios = $this->episodModel->getSerieId($id);
        $temporadas = $this->tempoModel->getTemporadas();
        $logueado = $this->helper->checkUser();
        $this->view->renderEpiTemp($episodios, $logueado, $temporadas);
    
    }
}
