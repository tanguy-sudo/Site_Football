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
            <div id='myToast'>
                <div class='d-flex justify-content-center'>    
                    <div class='toast-body'>
                        Adresse email ou mot de passe erroné
                    </div>
                </div>
            </div>
            ";
            echo"<script> toastFunction(); </script>";
            unset($_SESSION['connErr']);
        }
    }

    public function connex() {
        $Email = $this->requete->getParametre("Email");
        $password = $this->requete->getParametre("motDePasse");
        $user = $this->utilisateur->getUserEmail($Email);
        $passwordCrypted = $user['motDePasse'];
 
        //teste l'existance de l'utilisateur
        if(password_verify($password, $passwordCrypted)) {
            $_SESSION['idUtilisateur'] = $user['id_utilisateur'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['type'] = $user['type'];
            $_SESSION['valideConnexion'] = true;
            $_SESSION['connReu']='connReu'; // va me permettre de créer un "toast" pour afficher dans la vu index d'accueil "Connexion réussi"
            header("location:../../accueil/index");
        } else {
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

