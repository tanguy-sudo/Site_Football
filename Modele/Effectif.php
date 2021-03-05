<?php

require_once 'Framework/Modele.php';

class Effectif extends Modele {

// Renvoie la liste des effectifs
    public function getEffectifs() {
        $sql = 'SELECT * FROM effectif';
        $effectifs = $this->executerRequete($sql);
        return $effectifs;
    }

// Renvoie la liste des effectifs non licencié
    public function getEffectifsNonLicencie(){
        $sql = "SELECT * FROM effectif WHERE Licence = 'oui'";
        $effectifs = $this->executerRequete($sql);
        return $effectifs;
    }

// Ajout d'un nouvel effectif
    public function addEffectifs($nom, $prenom, $typelicence, $Licencie) {
        $sql = 'insert into effectif(typeLicence, prenom, nom, Licence) values(?, ?, ?, ?)';
        $this->executerRequete($sql, array($typelicence, $prenom, $nom, $Licencie));
    }

// retourne un effectif
    public function getEffectif($type, $prenom, $nom, $Licencie) {
        $sql = 'SELECT * 
                FROM effectif
                WHERE typeLicence = ? AND prenom = ? AND nom = ? AND Licence = ?';
        $absence = $this->executerRequete($sql, array($type, $prenom, $nom, $Licencie));
        return $absence->fetch();
    }

//supprimer un effectif
    public function delEffectif($id) {
        $sql = 'DELETE 
                FROM effectif
                WHERE id_effectif = ?';
        $this->executerRequete($sql, array($id));
    }

//mettre a jour un effectif
    public function UpdEffectif($id) {
        $sql = "UPDATE effectif
                SET Licence = 'oui'
                WHERE id_effectif = ?";
        $this->executerRequete($sql, array($id));
    }
}
