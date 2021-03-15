<?php $this->titre = "Absence"; ?>

<div class="row margin-row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Code de l'absence</th>
                <th scope="col">Date</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) : ?>
                    <th scope="col"></th>
                    <th scope="col"></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($absences as $absence): ?>
                <tr>
                    <td> <?= $this->nettoyer($absence['codeAbsence']) ?> </td>
                    <!-- la date est au format EN je l'affiche au format FR -->
                    <td> <?= implode('/', array_reverse(explode('-', $this->nettoyer($absence['date']) ))); ?> </td>
                    <td> <?= $this->nettoyer($absence['prenom']) ?> </td>
                    <td> <?= $this->nettoyer($absence['nom']) ?> </td>            
                    <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) : ?>
                        <form method="post" action="absence/supprimer">
                            <td> <input type="hidden" name="id" value="<?= $absence['id_absence'] ?>" /> </td>
                            <td> <input type="submit" value="supprimer" /> </td>
                        </form> 
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

if(isset($_SESSION['ajoutAb'])){ 
                echo"              
                <div id='myToast'>
                    <div class='d-flex justify-content-center'>    
                        <div class='toast-body'>
                            Ajout réussi
                        </div>
                    </div>
                </div>
                ";
                echo"<script> toastFunction(); </script>";
                unset($_SESSION['ajoutAb']);
}

if(isset($_SESSION['errAjoutAb'])){
    echo"              
    <div id='myToast'>
        <div class='d-flex justify-content-center'>    
            <div class='toast-body'>
                Cette personne est déjà absente cette journée
            </div>
        </div>
    </div>
    ";
    echo"<script> toastFunction(); </script>";
    unset($_SESSION['errAjoutAb']);
}

if(isset($_SESSION['supAb'])){
    echo"              
    <div id='myToast'>
        <div class='d-flex justify-content-center'>    
            <div class='toast-body'>
                Absence supprimé
            </div>
        </div>
    </div>
    ";
    echo"<script> toastFunction(); </script>";
    unset($_SESSION['supAb']);
}

?>