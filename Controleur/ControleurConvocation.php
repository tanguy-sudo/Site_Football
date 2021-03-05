<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Convocation.php';

class ControleurConvocation extends Controleur {

    private $convocation;

    public function __construct() {
        $this->convocation = new Convocation();
    }

    public function index() {
        $date = empty($this->requete->getParametre("date")) ? date("Y-m-d") : implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
        $convocations = $this->convocation->getConvocation($date);
        $effectifs = $this->convocation->geteffectifConv();
        $this->genererVue(array('convocations' => $convocations,
                                'effectifs'    => $effectifs,
                                'dateChoisi'         => $date
                           ));
    }
    
     public function ajoutConvocation() {
        if($this->EntraineurisConnected()){
        	
        $date = empty($this->requete->getParametre("date")) ? date("Y-m-d") : implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
        $convocations = $this->convocation->getConvocation($date);
        $effectifs = $this->convocation->geteffectifConv();
        $calendrier =$this->convocation->getrencontre($date);
           $this->genererVue(array('convocations' => $convocations,
                                'effectifs'  => $effectifs,
                                'dateChoisi' => $date,
                                'rencontre' => $calendrier));  
        }
    } 

}
