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
            $effectifs = $this->effectif->getEffectifs();
            $this->genererVue(array('effectifs' => $effectifs));
            if(isset($_SESSION['ajoutEf'])){
                echo "<script>M.toast({html:'Ajout réussi'})</script>";
                unset($_SESSION['ajoutEf']);
            }
            if(isset($_SESSION['errAjoutEf'])){
                echo "<script>M.toast({html:'Cette personne existe déjà'})</script>";
                unset($_SESSION['errAjoutEf']);
            }
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
            $unEffectif = $this->effectif->getEffectif($typelicence, $prenom, $nom);

            if(!$unEffectif){
                if(isset($nom) && isset($prenom) && isset($prenom)){
                    $_SESSION['ajoutEf']='ajoutEf';
                    $this->effectif->addEffectifs($nom, $prenom, $typelicence);
                    $this->executerAction('index');
                }
            }
            else{
                $_SESSION['errAjoutEf']='errAjoutEf';
                $this->executerAction('index');
            }
        }
    }

}