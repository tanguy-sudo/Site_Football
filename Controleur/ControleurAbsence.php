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
            if(isset($_SESSION['errAjoutAb'])){
                echo "<script>M.toast({html:'Cette personne est déjà absente cette journée'})</script>";
                unset($_SESSION['errAjoutAb']);
            }
            if(isset($_SESSION['supAb'])){
                echo "<script>M.toast({html:'Absence supprimé'})</script>";
                unset($_SESSION['supAb']);
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
            $date = empty($this->requete->getParametre("date")) ? date("Y-m-d") : implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
            $code = $this->requete->getParametre("code");
            $uneAbsence = $this->absence->getAbsence($id, $date, $code);
            if(!$uneAbsence){
                if(isset($id) && isset($date) && isset($code)){
                    $_SESSION['ajoutAb']='ajoutAb';
                    $this->absence->addAbsence($id, $date, $code);
                    $this->executerAction('index');
                }
            }
            else{
                $_SESSION['errAjoutAb']='errAjoutAb';
                $this->executerAction('index');
            }
        }
    }

    public function supprimer(){
        if($this->isConnect()){
            $id = $this->requete->getParametre("id");
            if(isset($id)){
                $_SESSION['supAb']='supAb';
                $this->absence->delAbsence($id);
                $this->executerAction('index');
            }
        }
    }

}