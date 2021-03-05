<?php $this->titre = "ajoutConvocation"; ?>
<form method="post" action="convocation/ajoutConvocation/">
    <div class="row text-center">
        <div class="mb-3">
            <input type="date" name="date" id="dateConv" value="<?= $dateChoisi ?>"> 
            <label for="dateConv">Date de convocation</label>       
        </div>
        <div class="mb-3">
            <button type="submit" name="action" class="btn btn-primary mb-3">Valider</button>    
        </div>
    </div>
</form>
<div class="row">
    <?php 

    if($rencontre->rowCount() == 0) : ?>
        <h5 class="text-center">Aucune rencontre pour cette date</h5>
    
    <?php endif; ?>
