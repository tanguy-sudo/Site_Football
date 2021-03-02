<?php $this->titre = "Convocation"; ?>

<div class="row center">
    <div class="col s12 m3"></div>
    <div class="col s12 m6">
        <form method="post" action="convocation/index/">
            <div class="input-field">
                <input type="text" class="datepicker" id="dateConv" name="date" value="<?= $dateChoisi ?>">  
                <label for="dateConv">Date de convocation</label>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Valider
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row center">
    <?php if($convocations->rowCount() == 0) : ?>
        <h5 class="header col s12 light">Aucune convocation pour cette date</h5>
    <?php endif; ?>
        <?php foreach($convocations as $convocation): ?>
            <div class="col s4">
                <div class="card-panel grey lighten-5">
                    <table>
                        <tr><td>Compétition : </td><td> <?= $this->nettoyer($convocation['competition']) ?> </td></tr>
                        <tr><td>Equipe adverse :</td><td> <?= $this->nettoyer($convocation['equipeAdverse']) ?> </td></tr>
                        <tr><td>Site :</td><td> <?= $this->nettoyer($convocation['site']) ?> </td></tr>
                        <tr><td>Terrain : </td><td> <?= $this->nettoyer($convocation['terrain']) ?> </td></tr>
                        <tr><td>Heure : </td><td> <?= $this->nettoyer($convocation['heure']) ?> </td></tr>
                        <tr><td>Message : </td><td> <?= $this->nettoyer($convocation['messageRdv']) ?> </td></tr>
                        <tr><td>Equipe : </td><td> <?= $this->nettoyer($convocation['equipe']) ?> </td></tr>
                    
                        <tr><td colspan="2">Liste des joueurs :</td></tr>
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
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
</div>
