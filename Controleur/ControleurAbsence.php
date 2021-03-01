<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Absence.php';

class ControleurAbsence extends Controleur {

    private $absence;

    public function __construct(){
        $this->absence = new Absence();
    }

    public function index(){
            $absences =$this->absence->getAbsences();
            $this->genererVue(array('absences' => $absences));
    }

}