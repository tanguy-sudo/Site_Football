<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Rencontre.php';

class ControleurRencontre extends Controleur {
    
    private $rencontre;

    public function __construct() {
        $this->rencontre = new Rencontre();
    }

    public function index() {
        $rencontres = $this->rencontre->getRencontre();
        $this->genererVue(array('rencontres' => $rencontres));
    }

}