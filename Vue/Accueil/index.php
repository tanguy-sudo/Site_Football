<?php $this->titre = "Accueil"; ?>
<div class="bg-image bg-accueil">
</div>

<?php

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

?>