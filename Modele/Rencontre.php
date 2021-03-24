<?php
namespace Modeles;

use Framework\Modele;
//require_once 'Framework/Modele.php';

class Rencontre extends Modele {

// Renvoie la liste des rencontres
    public function getRencontres() {
        $sql = 'SELECT * FROM calendrierrencontre';
        $rencontres = $this->executerRequete($sql);
        return $rencontres;
    }

// Renvoie la liste des rencontres trié par date
    public function getRencontresFilterDate() {
        $sql = 'SELECT * FROM calendrierrencontre ORDER BY date DESC';
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

// Mise à jour partiel d'une rencontre
    public function updateRencontre($EquipeAdv, $date, $heure, $terrain, $site, $id_rencontre){
        $sql = "UPDATE calendrierrencontre
                SET  equipeAdverse = ?, date = ?, heure = ?, terrain = ?, site = ?
                WHERE id_rencontre = ?";
        $this->executerRequete($sql, array($EquipeAdv, $date, $heure, $terrain, $site, $id_rencontre));
    }

// Mise à jour complette d'une rencontre
public function updateRencontreAll($categorie, $competition, $Equipe, $EquipeAdverse, $date,
    $heure, $terrain, $site, $id_rencontre){
    $sql = "UPDATE calendrierrencontre
            SET  categorie = ?, competition = ?, equipe = ?, equipeAdverse = ?, date = ?, heure = ?, terrain = ?, site = ?
            WHERE id_rencontre = ?";
    $this->executerRequete($sql, array($categorie, $competition, $Equipe, $EquipeAdverse, $date,
    $heure, $terrain, $site, $id_rencontre));
}

// supprime de la table rencontre un enregistrement
    public function delRencontre($id_rencontre){
        $sql = 'DELETE 
                FROM calendrierrencontre
                WHERE id_rencontre = ?';
        $this->executerRequete($sql, array($id_rencontre));
    }

    public function getrencontreSansConvocation($date){
        $sql = 'SELECT *  
                FROM calendrierrencontre          
                WHERE date=?
                AND id_rencontre NOT IN ( SELECT id_rencontre FROM convocation)';
        $calendrier = $this->executerRequete($sql, array($date));
        return $calendrier;
    }

    public function getrencontreAvecConvocation($date){
        $sql = 'SELECT *  
                FROM calendrierrencontre ca JOIN convocation co ON ca.id_rencontre = co.id_rencontre
                WHERE date=? AND co.publier=false';
        $calendrier = $this->executerRequete($sql, array($date));
        return $calendrier;
    }

    // Recuperation une rencontre par rapport a une date et une equipe
    public function getRencontreEquipeDate($categorie, $Equipe, $date){
        $sql = 'SELECT * 
                FROM calendrierrencontre
                WHERE categorie = ? AND equipe = ? AND date = ?';
        $rencontre = $this->executerRequete($sql, array($categorie, $Equipe, $date));
        return $rencontre->fetch();
    }

}
