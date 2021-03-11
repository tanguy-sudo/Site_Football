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
                WHERE ca.date=?';
        $convocation = $this->executerRequete($sql, array($date));
        return $convocation;
    }

    public function geteffectifConv() {
        $sql = 'SELECT *  
                FROM convoquee co 
                JOIN effectif ef ON co.id_effectif = ef.id_effectif
                ORDER BY ef.prenom';
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

	public function delConvoque($id_convocation){
		$sql="DELETE 
                FROM convoquee
                WHERE id_convocation = ?";
                $this->executerRequete($sql,array($id_convocation));
	}
    
    
    public function getdateConv(){
		$sql= "SELECT DISTINCT date 
					from calendrierrencontre ";
		$convocation =$this->executerRequete($sql);
			return $convocation->fetchAll();    
    }

 public function getAbsence($id, $date) {
        $sql = 'SELECT * 
                FROM absence
                WHERE  date = ? AND id_Effectif = ?';
        $absence = $this->executerRequete($sql, array($date, $id));
        return $absence->fetch();
    }

		public function geteffectifAbs($date,$dates){
            $sql='select *
				from effectif
				where id_effectif not in (SELECT id_effectif 
                FROM absence
                WHERE  date = ? ) and id_effectif not in  (Select id_effectif
                from convoquee co join  convocation ca ON co.id_convocation= ca.id_convocation join calendrierrencontre b on ca.id_rencontre=b.id_rencontre
                where  date = ?)';
            $lista=$this->executerRequete($sql,array($dates,$date));
            	return $lista->fetchAll();
		
		
		}

		public function addconvoc($id_rencontre,$id_effectif){      
			$sql='insert into convoquee(id_effectif,id_convocation) values(?,?)';
			$this->executerRequete($sql, array($id_effectif,$id_rencontre));		
		}		
		
		public function creatconvoc($id_rencontre){
		$sql="insert into convocation(id_rencontre) values(?)";
			$this->executerRequete($sql, array($id_rencontre));	
		
		}
		
		
		public function getidconv($id_rencontre){
			$sql="select id_convocation from convocation where id_rencontre=$id_rencontre";
			$conv=$this->executerRequete($sql, array($id_rencontre));
			return $conv->fetch();	
		}
		
		
		public function getrencontre($date) {
            $sql = 'SELECT *  
                    FROM calendrierrencontre                 
                    WHERE date=?';
            $calendrier = $this->executerRequete($sql, array($date));
            return $calendrier;
        }
        public function getrencontreF($date) {
            $sql = 'SELECT *  
                    FROM calendrierrencontre                 
                    WHERE date=?';
            $calendrier = $this->executerRequete($sql, array($date));
            return $calendrier->fetchAll();
        }
    
    public function getidrencontre($equipe,$date){
     $sql = 'SELECT id_rencontre  
                FROM calendrierrencontre                 
                WHERE date=? and equipe=? ';
        $calendrier = $this->executerRequete($sql, array($date,$equipe));
        return $calendrier->fetch();
    
    
    }

}
