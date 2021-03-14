<?php
namespace Modeles;

use Framework\Modele;
//require_once 'Framework/Modele.php';

class Utilisateur extends Modele {
    
    // renvoi l'utilisateur, s'il existe
    public function getUtilisateur($Email, $password) {
        $sql = 'SELECT *  
                FROM utilisateur u
                WHERE u.adresseEmail=? AND u.motDePasse=?';
        $utilisateur = $this->executerRequete($sql, array($Email, $password));
        return $utilisateur->fetch();
    }

    public function getUserEmail($Email){
        $sql = 'SELECT *  
                FROM utilisateur u
                WHERE u.adresseEmail=?';
        $utilisateur = $this->executerRequete($sql, array($Email));
        return $utilisateur->fetch();
    }
}
