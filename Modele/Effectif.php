<?php

require_once 'Framework/Modele.php';

class Effectif extends Modele {

// Renvoie la liste des effectifs
    public function getEffectifs() {
        $sql = 'SELECT * FROM effectif';
        $effectifs = $this->executerRequete($sql);
        return $effectifs;
    }

    // Ajout d'un nouvelle effectif
    public function addEffectifs($nom, $prenom, $typelicence) {
        $sql = 'insert into effectif(typeLicence, prenom, nom) values(?, ?, ?)';
        $this->executerRequete($sql, array($typelicence, $prenom, $nom));
    }

}
