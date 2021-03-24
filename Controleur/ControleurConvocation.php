
<?php

use Framework\Controleur;
use Modeles\Convocation;
use Modeles\Rencontre;
use Modeles\Effectif;
use Modeles\Convoquee;
use Modeles\Absence;

//require_once 'Modele/Convocation.php';

class ControleurConvocation extends Controleur {

    private $convocation;
    private $rencontre;
    private $effectif;
    private $convoquee;
    private $absent;

    public function __construct() {
        $this->convocation = new Convocation();
        $this->rencontre = new Rencontre();
        $this->effectif = new Effectif();
        $this->convoquee = new Convoquee();
        $this->absent = new Absence();
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
                //$convocations = $this->convocation->getConvocation($date);
                $effectifs = $this->effectif->getEffectifNonAbs($date);
                $absents = $this->absent->getAbsentDate($date);
                $calendrier =$this->rencontre->getrencontreSansConvocation($date);
                $this->genererVue(array(//'convocations' => $convocations,
                                        'effectifs'  => $effectifs,
                                        'dateChoisi' => $date,
                                        'rencontre' => $calendrier,
                                        'absents' => $absents
                                        )
                                );
            }
        } 
	
        public function valideConvocation(){
            if($this->EntraineurisConnected()){
                $idRenc0 = $this->requete->getParametre("idRencontre0"); 
                $idRenc1 = $this->requete->getParametre("idRencontre1"); 
                $idRenc2 = $this->requete->getParametre("idRencontre2"); 
                $message0 = $this->requete->getParametre("message0");    
                $message1 = $this->requete->getParametre("message1");  
                $message2 = $this->requete->getParametre("message2");  
                $ArrayEffectif0 = empty($this->requete->getParametre("effectif0")) ? [] : $this->requete->getParametre("effectif0"); 
                $ArrayEffectif1 = empty($this->requete->getParametre("effectif1")) ? [] : $this->requete->getParametre("effectif1"); 
                $ArrayEffectif2 = empty($this->requete->getParametre("effectif2")) ? [] : $this->requete->getParametre("effectif2"); 

                $radio = $this->requete->getParametre("flexRadioDefault"); 
                
                if(count($ArrayEffectif0) < 11 && !empty($ArrayEffectif0)){
                    $_SESSION['errConv']='errConv';
                    $this->executerAction('ajoutConvocation');
                }else if(count($ArrayEffectif1) < 11 && !empty($ArrayEffectif1)){
                    $_SESSION['errConv']='errConv';
                    $this->executerAction('ajoutConvocation');
                }else if( count($ArrayEffectif2) < 11 && !empty($ArrayEffectif2)){
                    $_SESSION['errConv']='errConv';
                    $this->executerAction('ajoutConvocation');
                }
                else {
                        if(isset($idRenc0) && isset($message0) && !empty($ArrayEffectif0)){
                            $idConv0 = $this->convocation->getConvocationIdRen($idRenc0);
                            if($idConv0){
                                $this->convocation->delConvocation($idConv0['id_convocation']);
                                $this->convoquee->delConvoquee($idConv0['id_convocation']);
                            }
                            if($radio == "radioPublish")
                                $this->convocation->creatconvoc($idRenc0, $message0, true);
                            else if($radio == "radioSave")
                                $this->convocation->creatconvoc($idRenc0, $message0, false);
                            
                            
                            $idConv0 = $this->convocation->getConvocationIdRen($idRenc0);

                            foreach($ArrayEffectif0 as $effectif){
                                $this->convocation->addconvoc($idConv0['id_convocation'], $effectif);
                            }
                        }
                        if(isset($idRenc1) && isset($message1) && !empty($ArrayEffectif1)){
                            $idConv1 = $this->convocation->getConvocationIdRen($idRenc1);
                            if($idConv1){
                                $this->convocation->delConvocation($idConv1['id_convocation']);
                                $this->convoquee->delConvoquee($idConv1['id_convocation']);
                            }    
                            if($radio == "radioPublish")
                                $this->convocation->creatconvoc($idRenc1, $message1, true);
                            else if($radio == "radioSave")
                                $this->convocation->creatconvoc($idRenc1, $message1, false);

                            $idConv1 = $this->convocation->getConvocationIdRen($idRenc1);
                            
                            foreach($ArrayEffectif1 as $effectif){
                                $this->convocation->addconvoc($idConv1['id_convocation'], $effectif);
                            }
                        }
                        if(isset($idRenc2) && isset($message2) && !empty($ArrayEffectif2)){
                            $idConv2 = $this->convocation->getConvocationIdRen($idRenc2);
                            if($idConv2){
                                $this->convocation->delConvocation($idConv2['id_convocation']);
                                $this->convoquee->delConvoquee($idConv2['id_convocation']);
                            }
                            if($radio == "radioPublish")
                                $this->convocation->creatconvoc($idRenc2, $message2, true);
                            else if($radio == "radioSave")
                                $this->convocation->creatconvoc($idRenc2, $message2, false);
                            
                            $idConv2 = $this->convocation->getConvocationIdRen($idRenc2);
                            
                            foreach($ArrayEffectif2 as $effectif){
                                $this->convocation->addconvoc($idConv2['id_convocation'], $effectif);
                            }
                        }
                        $_SESSION['AjoutConv']='AjoutConv';
                        $this->executerAction('index');	
                }
            }
        }

		public function supprimer(){
            if($this->EntraineurisConnected()){
                $id = $this->requete->getParametre("id");
                if(isset($id)){
                    $_SESSION['supConv']='supConv';
                    $this->convocation->delConvocation($id);
                    $this->convoquee->delConvoquee($id);
                    $this->executerAction('index');
                }
            }
        }

        public function convocationSauvegardees(){
            if($this->EntraineurisConnected()){
                $convocations = $this->convocation->getConvocationSave();
                $this->genererVue(array('convocations' => $convocations));
            }
        }

        public function modifierConvocation(){
            if($this->EntraineurisConnected()){
                $date = $this->requete->getParametre("date");
                $effectifs = $this->effectif->getEffectifNonAbs($date);
                $absents = $this->absent->getAbsentDate($date);
                $calendrier =$this->rencontre->getrencontreAvecConvocation($date);
                $effectifConvoquees = $this->convoquee->getEffectifConvoquee($date);

                $this->genererVue(array('effectifs'  => $effectifs,
                                        'dateChoisi' => $date,
                                        'rencontres' => $calendrier,
                                        'absents' => $absents,
                                        'effectifConvoquees' => $effectifConvoquees
                                        )
                                );
            }
        }

}
?>
