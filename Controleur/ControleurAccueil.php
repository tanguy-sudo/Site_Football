<?php

use Framework\Controleur;
//require_once 'Framework/Controleur.php';
class ControleurAccueil extends Controleur {

    public function __construct() {
    }

    public function index() {   
        $this->genererVue();
        
        if(isset($_SESSION['connReu'])){
            echo"              
            <div id='myToast'>
                <div class='d-flex justify-content-center'>    
                    <div class='toast-body'>
                        Connexion réussi
                    </div>
                </div>
            </div>
            ";
            echo"<script> toastFunction(); </script>";
            unset($_SESSION['connReu']);
        }
    }

}

