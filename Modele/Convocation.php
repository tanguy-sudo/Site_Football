<?php

require_once 'Framework/Modele.php';

class Convocation extends Modele {

// Renvoie la liste des convocation pour une date donnée
    public function getConvocation($date) {
        $sql = 'SELECT *  
                FROM calendrierrencontre ca 
                JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                WHERE ca.date=?';
        $convocation = $this->executerRequete($sql, array($date));
        return $convocation;
    }

    public function geteffectifConv() {
        $sql = 'SELECT *  
                FROM convoquee co 
                JOIN effectif ef ON co.id_effectif = ef.id_effectif';
        $convocation = $this->executerRequete($sql);
            return $convocation->fetchAll();
    }

    public function getConvocationIdRen($id_rencontre) {
        $sql = 'SELECT *  
                FROM convocation 
                WHERE id_rencontre = ?';
        $convocation = $this->executerRequete($sql, array($id_rencontre));
        return $convocation->fetch();
    }

// supprime de la table convocation une convocation
    public function delConvocation($id_rencontre){
        $sql = 'DELETE 
                FROM convocation
                WHERE id_rencontre = ?';
        $this->executerRequete($sql, array($id_rencontre));
    }

}
