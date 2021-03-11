
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
                                        'rencontre' => $calendrier
                                        )
                                );
            }
        } 
	
        public function valideConvocation(){
            if($this->isConnect()){
                $date = $this->requete->getParametre("date");
                $calendrier =$this->convocation->getrencontreF($date);
              
             
                $c=0;
               foreach($calendrier as $rencontre)
               { $c++;     
               $a=$rencontre['equipe'];
				       
								$b= $this->convocation->getidrencontre($a,$date);
								
												          
				        $id_match=$b['0'];
				        $this->convocation->creatconvoc($id_match);
				        $b=$this->convocation->getidconv($id_match);
				        $id_conv=$b['0'];
				       
                		for ($i=0;$i<14;$i++){
                			
                			
							  $val=$this->requete->getParametre("idEffectif$i,$c");
								if($val!="null"){
															
							$this->convocation->addconvoc($id_conv,$val);
							$this->executerAction('index');
								}
                		}
               	    
					}
					}}


		public function supprimer(){
        if($this->isConnect()){
            $id = $this->requete->getParametre("id");
            if(isset($id)){
                $_SESSION['supConv']='supConv';
                $this->convocation->delConvocation($id);
                $this->convocation->delConvoque($id);
                $this->executerAction('index');
            }
        }
    }



}
?>
