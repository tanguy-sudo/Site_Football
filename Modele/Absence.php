<?php
namespace Modeles;

//require_once 'Framework/Modele.php';
use Framework\Modele;

class Absence extends Modele {

// Renvoie la liste des absences
    public function getAbsences() {
        $sql = 'SELECT * 
                FROM absence a JOIN effectif e ON a.id_Effectif = e.id_effectif';
        $absences = $this->executerRequete($sql);
        return $absences;
    }

// Renvoie la liste des absences
    public function getAbsencesFilterDate() {
        $sql = 'SELECT * 
                FROM absence a JOIN effectif e ON a.id_Effectif = e.id_effectif ORDER BY date DESC';
        $absences = $this->executerRequete($sql);
        return $absences;
    }

// Ajoute une absence
    public function addAbsence($id, $date, $code){
        $sql = 'insert into absence(codeAbsence, date, id_Effectif) values(?, ?, ?)';
        $this->executerRequete($sql, array($code, $date, $id));
    }

//retourne une absence
    public function getAbsence($id, $date, $code) {
        $sql = 'SELECT * 
                FROM absence
                WHERE codeAbsence = ? AND date = ? AND id_Effectif = ?';
        $absence = $this->executerRequete($sql, array($code, $date, $id));
        return $absence->fetch();
    }

//supprimer une absence
    public function delAbsence($id) {
        $sql = 'DELETE 
                FROM absence
                WHERE id_absence = ?';
        $this->executerRequete($sql, array($id));
    }

    
//retourne les absents pour une date
    public function getAbsentDate($date) {
        $sql = "SELECT * 
                FROM absence a JOIN effectif e ON a.id_Effectif = e.id_effectif
                WHERE  a.date = ?";
        $absences = $this->executerRequete($sql, array($date));
        return $absences->fetchAll();
    }


}