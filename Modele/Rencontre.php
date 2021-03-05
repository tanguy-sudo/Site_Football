<?php

require_once 'Framework/Modele.php';

class Rencontre extends Modele {

// Renvoie la liste des rencontres
    public function getRencontres() {
        $sql = 'SELECT * FROM calendrierrencontre';
        $rencontres = $this->executerRequete($sql);
        return $rencontres;
    }

// Recuperation des valeurs de de la colonne 'competition' car c'est un type ENUM
    public function getCompetitions() {
        $sql = "SHOW COLUMNS FROM calendrierrencontre LIKE 'competition'";
        $res = $this->executerRequete($sql);
        $tab = $res->fetchObject();
        $type = substr($tab->Type, 6, -2);
        //$tab->Type me retourne enum('Amical','Coupe de France','Coupe de l''Anjou','Coupe des Pays de la loire','Coupe des Réserves','D1 Groupe A','D4 Groupe E','D5 Groupe A')
        $liste_type = explode( "','", $type );
        return $liste_type;
    }

// Recuperation une rencontre
    public function getRencontre($categorie, $competition, $Equipe, $EquipeAdv, $date,
    $heure, $terrain, $site) {
        $sql = 'SELECT * 
                FROM calendrierrencontre
                WHERE categorie = ? AND competition = ? AND equipe = ? AND equipeAdverse = ? AND date = ? 
                AND heure = ? AND terrain = ? AND site = ?';
        $rencontre = $this->executerRequete($sql, array($categorie, $competition, $Equipe, $EquipeAdv, $date,
        $heure, $terrain, $site));
        return $rencontre->fetch();
    }

// Recuperation une rencontre par id_rencontre
    public function getRencontreId($id_rencontre){
        $sql = 'SELECT * 
                FROM calendrierrencontre
                WHERE id_rencontre = ?';
        $rencontre = $this->executerRequete($sql, array($id_rencontre));
        return $rencontre->fetch();
    }

// Ajout d'une rencontre
    public function addRencontre($categorie, $competition, $Equipe, $EquipeAdv, $date,
    $heure, $terrain, $site) {
        $sql = 'INSERT INTO calendrierrencontre (categorie, competition, equipe, equipeAdverse, date, heure, terrain, site)
                values(?, ?, ?, ?, ?, ?, ?, ?)';
        $rencontre = $this->executerRequete($sql, array($categorie, $competition, $Equipe, $EquipeAdv, $date,
        $heure, $terrain, $site));
    }

// Mise à jour d'une rencontre
    public function updateRencontre($EquipeAdv, $date, $heure, $terrain, $site, $id_rencontre){
        $sql = "UPDATE calendrierrencontre
                SET  equipeAdverse = ?, date = ?, heure = ?, terrain = ?, site = ?
                WHERE id_rencontre = ?";
        $this->executerRequete($sql, array($EquipeAdv, $date, $heure, $terrain, $site, $id_rencontre));
    }

// supprime de la table rencontre un enregistrement
    public function delRencontre($id_rencontre){
        $sql = 'DELETE 
                FROM calendrierrencontre
                WHERE id_rencontre = ?';
        $this->executerRequete($sql, array($id_rencontre));
    }

}
