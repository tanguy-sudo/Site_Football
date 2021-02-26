<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Convocation.php';

class ControleurConvocation extends Controleur {

    private $convocation;

    public function __construct() {
        $this->convocation = new Convocation();
    }

    public function index() {
        //date('Y-m-d')
        $convocations = $this->convocation->getConvocation("2020-08-23");
        $effectifs = $this->convocation->geteffectifConv();
        $this->genererVue(array('convocations' => $convocations,
                                'effectifs'    => $effectifs
                            ));
    }

}

