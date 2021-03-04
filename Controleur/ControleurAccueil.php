<?php

require_once 'Framework/Controleur.php';

class ControleurAccueil extends Controleur {

    public function __construct() {
    }

    public function index() {   
        $this->genererVue();
        
        if(isset($_SESSION['connReu'])){
            echo"              
            <div class='toast align-items-center position-absolute top-50 start-50 translate-middle text-white bg-secondary' id='myToast' role='alert' aria-live='assertive' aria-atomic='true' data-bs-delay='1700'>
                <div class='d-flex justify-content-center'>    
                    <div class='toast-body'>
                        Connexion réussi
                    </div>
                </div>
            </div>
            ";
            unset($_SESSION['connReu']);
        }
    }

}

