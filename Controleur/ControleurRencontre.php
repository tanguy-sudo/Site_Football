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
            echo "<script>M.toast({html:'Cette rencontre existe déjà'})</script>";
            unset($_SESSION['errAjoutRen']);
        }
        if(isset($_SESSION['AjoutRen'])){
            echo "<script>M.toast({html:'Ajout réussi'})</script>";
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