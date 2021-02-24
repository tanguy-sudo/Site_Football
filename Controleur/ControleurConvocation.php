<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Convocation.php';

class ControleurConvocation extends Controleur {

    private $convocation;

    public function __construct() {
        $this->convocation = new Convocation();
    }

    public function index() {
        $convocations = $this->convocation->getConvocation();
        $this->genererVue(array('convocations' => $convocations));
    }

}

