<?php

use Framework\Controleur;
//require_once 'Framework/Controleur.php';
class ControleurAccueil extends Controleur {

    public function __construct() {
    }

    public function index() {   
        $this->genererVue();
    }

}

