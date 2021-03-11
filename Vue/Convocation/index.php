<?php $this->titre = "Convocation"; ?>
<div class="row margin-row">
    <form class="row g-3" method="post" action="convocation/index/">
        <div class="row text-center">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="date" id="dateConv" value="<?= $dateChoisi ?>"> 
                <label for="dateConv">Date de convocation</label>       
            </div>
            <div class="mb-3">
                <button type="submit" name="action" class="btn btn-primary mb-3">valider</button>    
            </div>
        </div>
    </form>
    <div class="row">
        <?php if($convocations->rowCount() == 0) : ?>
            <h5 class="text-center">Aucune convocation pour cette date</h5>
        <?php endif; ?>
            <?php foreach($convocations as $convocation): ?>
              
                <div class="col s4">
                    <div class="card-panel grey lighten-5">
                        <table class="table">
                       
                            <tr><th scope="col">Compétition : </td><td> <?= $this->nettoyer($convocation['competition']) ?> </td></tr>
                            <tr><th scope="col">Equipe adverse :</td><td> <?= $this->nettoyer($convocation['equipeAdverse']) ?> </td></tr>
                            <tr><th scope="col">Site :</td><td> <?= $this->nettoyer($convocation['site']) ?> </td></tr>
                            <tr><th scope="col">Terrain : </td><td> <?= $this->nettoyer($convocation['terrain']) ?> </td></tr>
                            <tr><th scope="col">Heure : </td><td> <?= $this->nettoyer($convocation['heure']) ?> </td></tr>
                            <tr><th scope="col">Message : </td><td> <?= $this->nettoyer($convocation['messageRdv']) ?> </td></tr>
                            <tr><th scope="col">Equipe : </td><td> <?= $this->nettoyer($convocation['equipe']) ?> </td></tr>
                        
                            <tr><th class="text-center" scope="col" colspan="2">Liste des joueurs :</td></tr>
                            <?php foreach($effectifs as $effectif): ?>
                                    <?php 
                                    $a = $this->nettoyer($convocation['id_convocation']);
                                    $b = $this->nettoyer($effectif['id_convocation']);
                                        if($a == $b ): 
                                    ?>
                                    <tr>
                                            <td> <?= $this->nettoyer($effectif['nom']) ?> </td>
                                            <td> <?= $this->nettoyer($effectif['prenom']) ?> </td>
                                    </tr>
                                        <?php endif; ?>
                            <?php endforeach; ?> 
                       <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) : ?>
                        <form method="post" action="convocation/supprimer">
                            <td> <input type="hidden" name="id" value="<?= $convocation['id_convocation'] ?>" /> </td>
                            <td> <input type="submit" value="supprimer" /> </td>
                        </form> 
                    <?php endif; ?>
                        </table>
                    </div>
                </div>
                
            <?php endforeach; ?>
    </div>
</div>
