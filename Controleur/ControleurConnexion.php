<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

class ControleurConnexion extends Controleur {

    private $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function index() {
        $this->genererVue();
    }

    public function connex() {
        $Email = $this->requete->getParametre("Email");
        $password = $this->requete->getParametre("motDePasse");
        $user = $this->utilisateur->getUtilisateur($Email, $password);
        if($user){
            // si l'utilisateur existe retour a la page accueil/index.php
            header("location:../../index");
        }else {
            //si non retourne a la page connexion/index.php
            $this->executerAction("index");
        }
    }

}

