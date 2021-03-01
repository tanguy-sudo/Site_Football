<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Absence.php';
require_once 'Modele/Effectif.php';

class ControleurAbsence extends Controleur {

    private $absence;
    private $effectif;

    public function __construct(){
        $this->absence = new Absence();
        $this->effectif = new Effectif();
    }

    public function index(){
            $absences =$this->absence->getAbsences();
            $this->genererVue(array('absences' => $absences));
            if(isset($_SESSION['ajoutAb'])){
                echo "<script>M.toast({html:'Ajout réussi'})</script>";
                unset($_SESSION['ajoutAb']);
            }
    }

    public function ajoutAbsence(){
        if($this->isConnect()){
            $effectifs = $this->effectif->getEffectifs();
            $this->genererVue(array('effectifs' => $effectifs)); 
        }
    }

    public function valideAbsence(){
        if($this->isConnect()){
            $id = $this->requete->getParametre("idEffectif");
            $date = $this->requete->getParametre("date");
            $code = $this->requete->getParametre("code");
            if(isset($id) && isset($date) && isset($code)){
                $_SESSION['ajoutAb']='ajoutAb';
                $this->absence->addAbsence($id, $date, $code);
                $this->executerAction('index');
            }
        }
    }

}