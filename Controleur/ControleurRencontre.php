<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Rencontre.php';

class ControleurRencontre extends Controleur {
    
    private $rencontre;

    public function __construct() {
        $this->rencontre = new Rencontre();
    }

    public function index() {
        $rencontres = $this->rencontre->getRencontres();
        $this->genererVue(array('rencontres' => $rencontres));

        if(isset($_SESSION['errAjoutRen'])){
            echo"              
            <div class='toast align-items-center position-absolute top-50 start-50 translate-middle text-white bg-secondary' id='myToast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-delay='1700'>
                <div class='d-flex justify-content-center'>    
                    <div class='toast-body'>
                        Cette rencontre existe déjà
                    </div>
                </div>
            </div>
            ";
            unset($_SESSION['errAjoutRen']);
        }

        if(isset($_SESSION['AjoutRen'])){
            echo"              
            <div class='toast align-items-center position-absolute top-50 start-50 translate-middle text-white bg-secondary' id='myToast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-delay='1700'>
                <div class='d-flex justify-content-center'>    
                    <div class='toast-body'>
                        Ajout réussi
                    </div>
                </div>
            </div>
            ";
            unset($_SESSION['AjoutRen']);
        }
    }

    
    public function ajoutRencontre() {
        if($this->SecretaireisConnected()){
            $competitions = $this->rencontre->getCompetitions();
            $this->genererVue(array('competitions' => $competitions));
        }
    }

    public function valideRencontre(){
        if($this->SecretaireisConnected()){
            $categorie = $this->requete->getParametre("categorie");
            $competition = $this->requete->getParametre("competition");
            $Equipe = $this->requete->getParametre("Equipe");
            $EquipeAdv = $this->requete->getParametre("EquipeAdv");
            $date = implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
            $heure = $this->requete->getParametre("heure");
            $terrain = $this->requete->getParametre("terrain");
            $site = $this->requete->getParametre("site");

            if(isset($categorie) && isset($competition) && isset($Equipe) && isset($EquipeAdv) 
            && isset($date) && isset($heure) && isset($terrain) && isset($site)){
                $res = $this->rencontre->getRencontre($categorie, $competition, $Equipe, $EquipeAdv, $date,
                $heure, $terrain, $site);
                if(!$res){
                    $this->rencontre->addRencontre($categorie, $competition, $Equipe, $EquipeAdv, $date,
                    $heure, $terrain, $site);
                    $_SESSION['AjoutRen']='AjoutRen';
                    $this->executerAction('index');
                }
                else{
                    $_SESSION['errAjoutRen']='errAjoutRen';
                    $this->executerAction('index');
                }
            }
        }
    }

}