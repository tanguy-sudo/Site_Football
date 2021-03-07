
<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Convocation.php';

class ControleurConvocation extends Controleur {

    private $convocation;

    public function __construct() {
        $this->convocation = new Convocation();
    }

    public function index() {
        $date = empty($this->requete->getParametre("date")) ? date("Y-m-d") : implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
        $convocations = $this->convocation->getConvocation($date);
        $effectifs = $this->convocation->geteffectifConv();
        $this->genererVue(array('convocations' => $convocations,
                                'effectifs'    => $effectifs,
                                'dateChoisi'         => $date
                           ));
    }

 public function ajoutConvocation() {
        if($this->EntraineurisConnected()){
        	
         $date = empty($this->requete->getParametre("date")) ? date("Y-m-d") : implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
        $convocations = $this->convocation->getConvocation($date);
        $effectifs = $this->convocation->geteffectifAbs($date,$date);
        $calendrier =$this->convocation->getrencontre($date);
           $this->genererVue(array('convocations' => $convocations,
                                'effectifs'  => $effectifs,
                                'dateChoisi' => $date,
                                'rencontre' => $calendrier));  
        }
    } 
	
public function valideConvocation(){
	if($this->isConnect()){
		 $date = empty($this->requete->getParametre("date")) ? date("Y-m-d") : implode('-', array_reverse(explode('/', $this->requete->getParametre("date"))));
         $calendrier =$this->convocation->getrencontre($date);
         $equipe=$this->requete->getParametre("ekip");
        $id_convocation= $this->convocation->getidrencontre($equipe,$date);
		for ($i=0;$i<14;$i++){
		 $id = $this->requete->getParametre("idEffectif$i");
					if($id!="null"){
					$this->Convocation->addconvoc($id_convocation,$id);
					}		
		}
	}}


}

?>
