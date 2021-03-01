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
        //teste l'existance de l'utilisateur
        if($user){
            $_SESSION['idUtilisateur'] = $user['id_utilisateur'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['type'] = $user['type'];
            $_SESSION['valideConnexion'] = true;
            header("location:../../accueil/index");
        }else {
            //sinon retourne a la page connexion/index.php
            $this->executerAction("index");
        }
    }

    public function deconnect(){
        if($this->isConnect()){
            session_destroy();
            header("location:../../accueil/index");
        }
    }
    

}

