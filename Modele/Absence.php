<?php

require_once 'Framework/Modele.php';

class Absence extends Modele {

// Renvoie la liste des absences
    public function getAbsences() {
        $sql = 'SELECT * 
                FROM absence a JOIN effectif e ON a.id_Effectif = e.id_effectif';
        $absences = $this->executerRequete($sql);
        return $absences;
    }

    public function addAbsence($id, $date, $code){
        $sql = 'insert into absence(codeAbsence, date, id_Effectif) values(?, ?, ?)';
        $this->executerRequete($sql, array($code, $date, $id));
    }

}
