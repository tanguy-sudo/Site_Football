<?php

require_once 'Framework/Controleur.php';

class ControleurAccueil extends Controleur {

    public function __construct() {
    }

    public function index() {   
        $this->genererVue();
        if(isset($_SESSION['connReu'])){
            echo "<script>M.toast({html:'Connexion réussi'})</script>";
            unset($_SESSION['connReu']);
        }
    }

}

