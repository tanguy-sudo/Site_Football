<?php $this->titre = "Absence"; ?>

<div class="row">
    <form class="col col s12" method="post" action="absence/valideAbsence">
        <div class="row">
            <div class="input-field col s6 offset-s3">
                    <select name="idEffectif" required>
                        <?php foreach($effectifs as $effectif): ?>
                            <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>"> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>         
                        <?php endforeach; ?>
                    </select>
                    <label>Effectifs</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input type="text" class="datepicker" id="dateConv" name="date" required>  
                <label for="dateConv">Date de convocation</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                    <select name="code" required>
                            <option value="Blessé">Blessé</option>
                            <option value="Suspendu">Suspendu</option>
                            <option value="Absent">Absent</option>         
                    </select>
                    <label>Code absence</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input class="btn waves-effect waves-light" type="submit" value="valider">
            </div>
        </div>
    </form>
</div> 