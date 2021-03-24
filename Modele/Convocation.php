<?php
namespace Modeles;

use Framework\Modele;
//require_once 'Framework/Modele.php';

class Convocation extends Modele {

// Renvoie la liste des convocation pour une date donnée
    public function getConvocation($date) {
        $sql = 'SELECT *  
                FROM calendrierrencontre ca 
                JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                WHERE ca.date=? AND publier=true';
        $convocation = $this->executerRequete($sql, array($date));
        return $convocation;
    }

    public function geteffectifConv() {
        $sql = 'SELECT *  
                FROM convoquee co 
                JOIN effectif ef ON co.id_effectif = ef.id_effectif
                ORDER BY ef.nom';
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

    // supprime de la table convocation une convocation par rapport à l'id de la rencontre
    public function delConvocationIdRen($id_rencontre){
        $sql = 'DELETE 
                FROM convocation
                WHERE id_rencontre = ?';
        $this->executerRequete($sql, array($id_rencontre));
    }

    // supprime de la table convocation une convocation
    public function delConvocation($id_convocation){
        $sql = 'DELETE 
                FROM convocation
                WHERE id_convocation = ?';
        $this->executerRequete($sql, array($id_convocation));
    }
    
    public function getrencontreF($date) {
        $sql = 'SELECT *  
                FROM calendrierrencontre                 
                WHERE date=?';
        $calendrier = $this->executerRequete($sql, array($date));
        return $calendrier->fetchAll();
    }

    public function creatconvoc($id_rencontre, $message, $publier){
		$sql="INSERT INTO convocation(id_rencontre, messageRdv, publier) 
              VALUES(?, ?, ?)";
		$this->executerRequete($sql, array($id_rencontre, $message, $publier));			
	}

    // Renvoie la liste des convocation pour une date donnée
    public function getConvocationSave() {
        $sql = 'SELECT *  
                FROM calendrierrencontre ca 
                JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                WHERE publier=false';
        $convocations = $this->executerRequete($sql);
        return $convocations->fetchAll();
    }

    // Renvoie la liste des convocation pour une date donnée et qui ne sont pas publier
    public function getConvocationNonPublier($date) {
        $sql = 'SELECT *  
                FROM calendrierrencontre ca 
                JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                WHERE ca.date=? AND publier=false';
        $convocation = $this->executerRequete($sql, array($date));
        return $convocation;
    }

    public function addconvoc($id_convocation, $id_effectif){      
        $sql='insert into convoquee(id_effectif,id_convocation) values(?,?)';
        $this->executerRequete($sql, array($id_effectif, $id_convocation));		
    }	
}
