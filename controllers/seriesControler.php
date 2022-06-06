<?php
require_once 'views/seriesView.php';
require_once 'models/seriesModel.php';

class SeriesController{
    private $view;
    private $tempoModel;
    private $episodModel;

    function __construct (){
        $this->view = new SeriesView();
        $this->tempoModel = new SeriesModel();
        $this->episodModel = new SeriesModel();
    }
    
    function showEpisodios($logueado){
        $episod= 'episodios';
        $episodios = $this->episodModel->getSerie($episod);
        $this->view->renderSeries($episod, $episodios, $logueado); 
    }

    function showTemporadas($logueado){
        $tempo= 'temporada';
        $temporadas = $this->tempoModel->getSerie($tempo);
        $this->view->renderSeries($tempo ,$temporadas, $logueado); 
    }
    function showHome($logueado){
        $this->view->renderHome($logueado);
    }


}

