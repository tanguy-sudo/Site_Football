<?php

use Framework\Controleur;
use Modeles\Absence;
use Modeles\Effectif;

//require_once 'Framework/Controleur.php';
//require_once 'Modele/Absence.php';
//require_once 'Modele/Effectif.php';

class ControleurAbsence extends Controleur {

    private $absence;
    private $effectif;

    public function __construct(){
        $this->absence = new Absence();
        $this->effectif = new Effectif();
    }

    public function index(){
            $absences =$this->absence->getAbsencesFilterDate();
            $this->genererVue(array('absences' => $absences));

            if(isset($_SESSION['ajoutAb'])){ 
                echo"              
                <div id='myToast'>
                    <div class='d-flex justify-content-center'>    
                        <div class='toast-body'>
                            Ajout réussi
                        </div>
                    </div>
                </div>
                ";
                echo"<script> toastFunction(); </script>";
                unset($_SESSION['ajoutAb']);
            }

            if(isset($_SESSION['errAjoutAb'])){
                echo"              
                <div id='myToast'>
                    <div class='d-flex justify-content-center'>    
                        <div class='toast-body'>
                            Cette personne est déjà absente cette journée
                        </div>
                    </div>
                </div>
                ";
                echo"<script> toastFunction(); </script>";
                unset($_SESSION['errAjoutAb']);
            }
            
            if(isset($_SESSION['supAb'])){
                echo"              
                <div id='myToast'>
                    <div class='d-flex justify-content-center'>    
                        <div class='toast-body'>
                            Absence supprimé
                        </div>
                    </div>
                </div>
                ";
                echo"<script> toastFunction(); </script>";
                unset($_SESSION['supAb']);
            }
    }

    public function ajoutAbsence(){
        if($this->isConnect()){
            $effectifs = $this->effectif->getEffectifsNonLicencie();
            $this->genererVue(array('effectifs' => $effectifs)); 
        }
    }

    public function valideAbsence(){
        if($this->isConnect()){
            $id = $this->requete->getParametre("idEffectif");
            $dates = $this->requete->getParametre("date");
            $code = $this->requete->getParametre("code");
            
            $tabDates = explode(',', $dates);
            // je parcours toutes les dates selectionnées pour les insérer
            foreach($tabDates as $dateFr){
                $dateFr = trim($dateFr);
                $datePhp = implode('-', array_reverse(explode('/', $dateFr)));
                $uneAbsence = $this->absence->getAbsence($id, $datePhp, $code);

                if(!$uneAbsence){
                    if(isset($id) && isset($dates) && isset($code)){
                        $_SESSION['ajoutAb']='ajoutAb';
                        $this->absence->addAbsence($id, $datePhp, $code);
                    }
                }
                else{
                    $_SESSION['errAjoutAb']='errAjoutAb';
                }
            }
            $this->executerAction('index');
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