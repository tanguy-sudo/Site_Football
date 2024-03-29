<?php $this->titre = "Convocation"; ?>
<?php $compteurRenc = 0; ?>
<div class="row margin-row">
    <form method="post" action="convocation/ajoutConvocation/" class="row g-3">
        <div class="row text-center">
            <div class="form-floating  mb-3">
                <input class="form-control" type="date" name="date" id="dateConv" value="<?= $dateChoisi ?>"> 
                <label for="dateConv">Date de rencontre</label>       
            </div>
            <div class="mb-3">
                <button type="submit" name="actionAjout" class="btn btn-primary mb-3">Valider</button>    
            </div>
        </div>
    </form>
    <?php if($rencontre->rowCount() != 0) : ?>
        <div class="row">
            <table class='table' id="tableAbsent">
                <thead>
                    <tr>
                        <th scope="col">Concoqué</th>
                        <th scope="col">Exempté</th>
                        <th scope="col">Absents</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($absents as $absent): ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?= $this->nettoyer($absent['prenom']).' '. $this->nettoyer($absent['nom']).' ('.$this->nettoyer($absent['codeAbsence']).')'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> 
    <?php endif; ?>  
    <div class="row">
        <?php if($rencontre->rowCount() == 0) : ?>
            <h5 class="text-center">Aucune rencontre sans convocation pour cette date</h5>   
        <?php else: ?>
            <?php $compteurRenc=0; $compteurMessage = 0; ?>
            <form class="row g-3" method="post" action="convocation/valideConvocation">
                <?php foreach($rencontre as $rencontres): ?>
                    <div class="col s4">
                        <div class="card-panel grey lighten-5">               
                            <table class="table">
                                <tr><th scope="col">Compétition : </th><td> <?= $this->nettoyer($rencontres['competition']) ?> </td></tr>
                                <tr><th scope="col">Equipe adverse :</th><td> <?= $this->nettoyer($rencontres['equipeAdverse']) ?> </td></tr>
                                <tr><th scope="col">Site :</th><td> <?= $this->nettoyer($rencontres['site']) ?> </td></tr>
                                <tr><th scope="col">Terrain : </th><td> <?= $this->nettoyer($rencontres['terrain']) ?> </td></tr>
                                <tr><th scope="col">Heure : </th><td> <?= $this->nettoyer($rencontres['heure']) ?> </td></tr>           
                                <tr><th scope="col">Equipe : </th><td> <?= $this->nettoyer($rencontres['equipe']) ?> </td></tr>                 
                                <input type="hidden" name="idRencontre<?= $compteurRenc; ?>" value="<?= $this->nettoyer($rencontres['id_rencontre']) ?>">
                                <tr><th class="text-center" scope="col" colspan="2">Liste des joueurs :</th></tr>
                            </table>                  
                            <div class="form-floating mb-3">
                                <input id="Message" class="form-control" type="text" name='message<?= $compteurMessage;?>'>
                                <label for="Message">Message</label>
                            </div>
                            <div class="mb-3">
                                <select id="PlayerList<?= $compteurRenc; ?>" required name="effectif<?= $compteurRenc; ?>[]" class="multiselect form-select form-select-lg" multiple size="14">
                                    <?php foreach($effectifs as $effectif): ?>
                                        <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>"> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>  
                                    <?php endforeach; ?>
                                </select>
                            </div>                        
                        </div>  
                    </div>     
                    <?php $compteurMessage++; ?>
                    <?php $compteurRenc++; ?>
                <?php endforeach; ?>    
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="radioSave" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Sauvegarder
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="radioPublish" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Publier
                    </label>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" name="ajout" class="btn btn-primary mb-3">Valider</button>
                </div>
            </form>
        <?php endif;?>
    </div>  
</div>

<?php

if(isset($_SESSION['errConv'])){
    echo"              
    <div id='myToast'>
        <div class='d-flex justify-content-center'>    
            <div class='toast-body'>
                Nombre de personnes sélectionné inférieur à 11
            </div>
        </div>
    </div>
    ";
    echo"<script> toastFunction(); </script>";
    unset($_SESSION['errConv']);
}

?>