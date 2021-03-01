<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Effectif.php';

class ControleurEffectif extends Controleur {

    private $effectif;

    public function __construct(){
        $this->effectif = new Effectif();
    }

    public function index(){
        if($this->isConnect()){
            $effectifs =$this->effectif->getEffectifs();
            $this->genererVue(array('effectifs' => $effectifs));
        }
    }

    public function ajoutEffectif(){
        if($this->isConnect()){
            $this->genererVue();   
        }
    }
    public function valideEffectif(){
        if($this->isConnect()){
            $nom = $this->requete->getParametre("nom");
            $prenom = $this->requete->getParametre("prenom");
            $typelicence = $this->requete->getParametre("typelicence");
            if(isset($nom) && isset($prenom) && isset($prenom)){
                $this->effectif->addEffectifs($nom, $prenom, $typelicence);
                $this->executerAction('index');
            }
        }
    }

}