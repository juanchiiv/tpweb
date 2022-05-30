<?php
require_once 'views/seriesView.php';
require_once 'models/seriesModel.php';

class seriesController{
    private $view;
    private $tempoModel;
    private $episodModel;

    function __construct (){
        $this->view = new seriesView();
        $this->tempoModel = new seriesModel();
        $this->episodModel = new seriesModel();
    }
    
    function showEpisodios(){
        $episodios = $this->episodModel->getSerie();
        $this->view->renderSeries($episodios); 
    }

    function showTemporadas(){
        $temporadas = $this->tempoModel->getSerie();
        $this->view->renderSeries($temporadas); 
    }
    function showHome(){
        $this->view->renderHome();
    }


}

