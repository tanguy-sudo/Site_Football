<?php

require_once 'Framework/Modele.php';

class Rencontre extends Modele {

// Renvoie la liste des rencontres
    public function getRencontre() {
        $sql = 'SELECT * FROM calendrierrencontre';
        $rencontres = $this->executerRequete($sql);
        return $rencontres;
    }

}
