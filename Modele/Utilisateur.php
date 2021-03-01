<?php

require_once 'Framework/Modele.php';

class Utilisateur extends Modele {
    
    // renvoi l'utilisateur, s'il existe
    public function getUtilisateur($Email, $password) {
        $sql = 'SELECT *  
                FROM utilisateur u
                WHERE u.adresseEmail=? AND u.motDePasse=?';
        $utilisateur = $this->executerRequete($sql, array($Email, $password));
        return $utilisateur->fetch();
    }
}
