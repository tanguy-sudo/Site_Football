<?php $this->titre = "Convocation"; ?>
<?php $compteurRenc = 0; ?>
<div class="row margin-row">
    <h4 class="text-center"><?= implode('/', array_reverse(explode('-', $dateChoisi)));?></h4> 
    
    <?php if($rencontres->rowCount() != 0) : ?>
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
            <?php $compteurRenc=0; $compteurMessage = 0; ?>
            <form class="row g-3" method="post" action="convocation/valideConvocation">
                <?php foreach($rencontres as $rencontre): ?>
                    <div class="col s4">
                        <div class="card-panel grey lighten-5">               
                            <table class="table">
                                <tr><th scope="col">Compétition : </th><td> <?= $this->nettoyer($rencontre['competition']) ?> </td></tr>
                                <tr><th scope="col">Equipe adverse :</th><td> <?= $this->nettoyer($rencontre['equipeAdverse']) ?> </td></tr>
                                <tr><th scope="col">Site :</th><td> <?= $this->nettoyer($rencontre['site']) ?> </td></tr>
                                <tr><th scope="col">Terrain : </th><td> <?= $this->nettoyer($rencontre['terrain']) ?> </td></tr>
                                <tr><th scope="col">Heure : </th><td> <?= $this->nettoyer($rencontre['heure']) ?> </td></tr>           
                                <tr><th scope="col">Equipe : </th><td> <?= $this->nettoyer($rencontre['equipe']) ?> </td></tr>                 
                                <input type="hidden" name="idRencontre<?= $compteurRenc; ?>" value="<?= $this->nettoyer($rencontre['id_rencontre']) ?>">
                                <tr><th class="text-center" scope="col" colspan="2">Liste des joueurs :</th></tr>
                            </table>                  
                            <div class="form-floating mb-3">
                                <input id="Message" class="form-control" type="text" name='message<?= $compteurMessage;?>' value="<?= $this->nettoyer($rencontre['messageRdv']); ?>">
                                <label for="Message">Message</label>
                            </div>
                            <div class="mb-3">
                                <select id="PlayerList<?= $compteurRenc; ?>" required name="effectif<?= $compteurRenc; ?>[]" class="multiselect form-select form-select-lg" multiple size="14">
                                    <?php foreach($effectifs as $effectif): ?>
                                        <?php $bool = false; ?>
                                        <?php foreach ($effectifConvoquees as $effectifConvoquee) : ?>
                                                <?php
                                                    $equipe = $this->nettoyer($effectifConvoquee['equipe']);
                                                    $id_eff = $this->nettoyer($effectifConvoquee['id_effectif']);
                                                ?>
                                                <?php if($equipe == $this->nettoyer($rencontre['equipe']) && $id_eff == $this->nettoyer($effectif['id_effectif'])){
                                                            $bool = true;
                                                            break;
                                                }?>
                                            }
                                        <?php endforeach; ?>
                                        <?php if($bool == true) : ?>
                                            <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>" selected> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>  
                                        <?php else : ?>
                                            <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>"> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>  
                                        <?php endif ?>

                                    <?php endforeach; ?>
                                </select>
                                <script>
                                            ListEffectifs();
                                </script>
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