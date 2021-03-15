<?php

use Framework\Controleur;
use Modeles\Effectif;
//require_once 'Modele/Effectif.php';

class ControleurEffectif extends Controleur {

    private $effectif;

    public function __construct(){
        $this->effectif = new Effectif();
    }

    public function index(){
        if($this->isConnect()){    
            $effectifs = $this->effectif->getEffectifs();
            $this->genererVue(array('effectifs' => $effectifs));
        }
    }

    public function ajoutEffectif(){
        if($this->SecretaireisConnected()){
            $this->genererVue();   
        }
    }

    public function valideEffectif(){
        if($this->SecretaireisConnected()){
            $nom = $this->requete->getParametre("nom");
            $prenom = $this->requete->getParametre("prenom");
            $typelicence = $this->requete->getParametre("typelicence");
            $Licencie = $this->requete->getParametre("Licencie");
            $unEffectif = $this->effectif->getEffectif($typelicence, $prenom, $nom, $Licencie);

            if(!$unEffectif){
                if(isset($nom) && isset($prenom) && isset($prenom) && isset($Licencie)){
                    $_SESSION['ajoutEf']='ajoutEf';
                    $this->effectif->addEffectifs($nom, $prenom, $typelicence, $Licencie);
                    $this->executerAction('index');
                }
            }
            else{
                $_SESSION['errAjoutEf']='errAjoutEf';
                $this->executerAction('index');
            }
        }
    }

    public function supprimer(){
        if($this->SecretaireisConnected()){
            $id = $this->requete->getParametre("id");
            if(isset($id)){
                $_SESSION['supEf']='supEf';
                $this->effectif->delEffectif($id);
                $this->executerAction('index');
            }
        }
    }
    public function modifieLicence(){
        if($this->SecretaireisConnected()){
            $idE = $this->requete->getParametre("idE");
            if(isset($idE)){
                $_SESSION['upEf']='upEf';
                $this->effectif->UpdEffectif($idE);
                $this->executerAction('index');
            }
        }
    }

}