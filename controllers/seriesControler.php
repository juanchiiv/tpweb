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
        $episod = 'episodios';
        $episodios = $this->episodModel->getSerie($episod);
        $logueado= $this->helper->sessionVerify();
        $this->view->renderSeries($episod, $episodios, $logueado);
    }

    function showTemporadas()
    {
        $tempo = 'temporada';
        $temporadas = $this->tempoModel->getSerie($tempo);
        $logueado= $this->helper->sessionVerify();
        $this->view->renderSeries($tempo, $temporadas, $logueado);
    }
    function showHome()
    {
        $logueado= $this->helper->sessionVerify();
        $this->view->renderHome($logueado);
    }
}
