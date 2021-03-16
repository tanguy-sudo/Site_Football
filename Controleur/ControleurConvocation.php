
<?php

use Framework\Controleur;
use Modeles\Convocation;
use Modeles\Effectif;

//require_once 'Modele/Convocation.php';

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
            if($this->EntraineurisConnected()){
                $date = $this->requete->getParametre("date");
                $calendrier =$this->convocation->getrencontreF($date);
                $idRenc0 = $this->requete->getParametre("idRencontre0"); 
                $idRenc1 = $this->requete->getParametre("idRencontre1"); 
                $idRenc2 = $this->requete->getParametre("idRencontre2"); 
                $message0 = $this->requete->getParametre("message0");    
                $message1 = $this->requete->getParametre("message1");  
                $message2 = $this->requete->getParametre("message2");  
                $ArrayEffectif0 = $this->requete->getParametre("effectif0"); 
                $ArrayEffectif1 = $this->requete->getParametre("effectif1"); 
                $ArrayEffectif2 = $this->requete->getParametre("effectif2"); 

                if(count($ArrayEffectif0) < 11 || count($ArrayEffectif1) < 11 || count($ArrayEffectif2) < 11){
                    $_SESSION['errConv']='errConv';
                    $this->executerAction('ajoutConvocation');
                }
                
                if(isset($idRenc0) && isset($message0)){
                    $this->convocation->creatconvoc($idRenc0, $message0);
                    $idConv0 = $this->convocation->getidconv($idRenc0);
                    foreach($ArrayEffectif0 as $effectif){
                        $this->convocation->addconvoc($idConv0['id_convocation'], $effectif);
                    }
                }
                if(isset($idRenc1) && isset($message1)){
                    $this->convocation->creatconvoc($idRenc1, $message1);
                    $idConv1 = $this->convocation->getidconv($idRenc1);
                    foreach($ArrayEffectif1 as $effectif){
                        $this->convocation->addconvoc($idConv1['id_convocation'], $effectif);
                    }
                }
                if(isset($idRenc2) && isset($message2)){
                    $this->convocation->creatconvoc($idRenc2, $message2);
                    $idConv2 = $this->convocation->getidconv($idRenc2);
                    foreach($ArrayEffectif2 as $effectif){
                        $this->convocation->addconvoc($idConv2['id_convocation'], $effectif);
                    }
                }
                $this->executerAction('index');			
        }
    }


		public function supprimer(){
        if($this->EntraineurisConnected()){
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
