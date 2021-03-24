<?php
namespace Modeles;

use Framework\Modele;
//require_once 'Framework/Modele.php';

class Convoquee extends Modele {

// supprime de la table convoquee les enregistrements ayant comme id_convocation le paramètre
    public function delConvoquee($id_convocation){
        $sql = 'DELETE 
                FROM convoquee
                WHERE id_convocation = ?';
        $this->executerRequete($sql, array($id_convocation));
    }

// Renvoie les effectifs convoquee a une date
    public function getEffectifConvoquee($date) {
        $sql = 'SELECT *  
                FROM calendrierrencontre ca JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                                            JOIN convoquee con ON co.id_convocation = con.id_convocation
                WHERE ca.date=? AND publier=false';
        $convocation = $this->executerRequete($sql, array($date));
        return $convocation->fetchAll();
    }

}
