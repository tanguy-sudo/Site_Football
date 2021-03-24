<?php
namespace Modeles;

use Framework\Modele;
//require_once 'Framework/Modele.php';

class Effectif extends Modele {

// Renvoie la liste des effectifs
    public function getEffectifs() {
        $sql = 'SELECT * FROM effectif ORDER BY prenom';
        $effectifs = $this->executerRequete($sql);
        return $effectifs;
    }

// Renvoie la liste des effectifs non licencié
    public function getEffectifsNonLicencie(){
        $sql = "SELECT * FROM effectif WHERE Licence = 'oui' ORDER BY prenom";
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
        $effectif = $this->executerRequete($sql, array($type, $prenom, $nom, $Licencie));
        return $effectif->fetch();
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
    public function getEffectifNonAbs($date) {
        $sql = "SELECT * 
                FROM effectif
                WHERE id_effectif NOT IN (SELECT id_Effectif FROM absence WHERE date = ?)
                AND Licence = 'oui'
                AND id_effectif NOT IN (SELECT id_effectif 
                                        FROM convoquee co join convocation con ON co.id_convocation= con.id_convocation 
                                                          join calendrierrencontre cal on con.id_rencontre=cal.id_rencontre
                                        WHERE date = ? AND con.publier=true)
                ORDER BY prenom";
        $effectifs = $this->executerRequete($sql, array($date, $date));
        return $effectifs->fetchAll();
    }   
}
