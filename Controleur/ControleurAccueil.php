<?php

require_once 'Framework/Controleur.php';

class ControleurAccueil extends Controleur {

    public function __construct() {
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $this->genererVue();
    }

}

