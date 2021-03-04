<?php $this->titre = "Absence"; ?>

<div class="row margin-row">
    <form class="row g-3" method="post" action="absence/valideAbsence">
        <div class="form-floating mb-3">
                    <select class="form-select" name="idEffectif" id="floatingSelect" required>
                        <?php foreach($effectifs as $effectif): ?>
                            <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>"> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>         
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Effectifs</label>
        </div>
        <div class="form-floating mb-3">
                <input type="date" class="form-control" id="dateConv" name="date" value="<?= date('Y-m-d');?>" required>  
                <label for="dateConv">Date de convocation</label>
        </div>
        <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect2" name="code" required>
                            <option value="Blessé">Blessé</option>
                            <option value="Suspendu">Suspendu</option>
                            <option value="Absent">Absent</option>         
                    </select>
                    <label for="floatingSelect2">Code absence</label>
        </div>
        <div class="mb-3">
            <button type="submit" name="ajoutAbs" class="btn btn-primary">valider</button>
        </div>
    </form>
</div> 