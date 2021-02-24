<?php

require_once 'Framework/Modele.php';

class Convocation extends Modele {

// Renvoie la liste des convocation
    public function getConvocation() {
        $sql = 'SELECT *  
                FROM calendrierrencontre ca 
                JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                JOIN convoquee con ON co.id_convocation = con.id_convocation
                JOIN effectif ef ON con.id_effectif = ef.id_effectif';
        $convocation = $this->executerRequete($sql);
        return $convocation;
    }

}