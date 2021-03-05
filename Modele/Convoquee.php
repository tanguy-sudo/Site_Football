<?php

require_once 'Framework/Modele.php';

class Convoquee extends Modele {

// supprime de la table convoquee les enregistrements ayant comme id_convocation le paramètre
    public function delConvoquee($id_convocation){
        $sql = 'DELETE 
                FROM convoquee
                WHERE id_convocation = ?';
        $this->executerRequete($sql, array($id_convocation));
    }

}
