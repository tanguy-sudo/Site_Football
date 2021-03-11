<?php

use Framework\Controleur;
use Modeles\Utilisateur;

//require_once 'Modele/Utilisateur.php';

class ControleurConnexion extends Controleur {

    private $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function index() {
        $this->genererVue();
        
        if(isset($_SESSION['connErr'])){
            echo"              
            <div class='toast align-items-center position-absolute top-50 start-50 translate-middle text-white bg-secondary' id='myToast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-delay='1700'>
                <div class='d-flex justify-content-center'>    
                    <div class='toast-body'>
                        Adresse email ou mot de passe erroné
                    </div>
                </div>
            </div>
            ";
            unset($_SESSION['connErr']);
        }
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
            $_SESSION['connReu']='connReu'; // va me permettre de créer un "toast" pour afficher dans la vu index d'accueil "Connexion réussi"
            header("location:../../accueil/index");
        }else {
            //sinon retourne a la page connexion/index.php
            $_SESSION['connErr']='connErr';
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

