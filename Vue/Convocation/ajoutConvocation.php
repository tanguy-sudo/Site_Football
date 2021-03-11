<?php $this->titre = "ajoutConvocation"; ?>
<?php $compteurRenc = 0; ?>
<div class="row margin-row">
    <form method="post" action="convocation/ajoutConvocation/" class="row g-3">
        <div class="row text-center">
            <div class="form-floating  mb-3">
                <input class="form-control" type="date" name="date" id="dateConv" value="<?= $dateChoisi ?>"> 
                <label for="dateConv">Date de convocation</label>       
            </div>
            <div class="mb-3">
                <button type="submit" name="actionAjout" class="btn btn-primary mb-3">Valider</button>    
            </div>
        </div>
    </form>

    <div class="row">
        <?php if($rencontre->rowCount() == 0) : ?>
            <h5 class="text-center">Aucune rencontre pour cette date</h5>   
        <?php endif; ?>
			<?php $compteurRenc=0; ?>
        <form class="row g-3" method="post" action="convocation/valideConvocation">
            <?php foreach($rencontre as $rencontres): ?>
            <?php $compteurRenc++; ?>
                <div class="col s4">
                    <div class="card-panel grey lighten-5">               
                        <table class="table">
                            <tr><th scope="col">Compétition : </td><td> <?= $this->nettoyer($rencontres['competition']) ?> </td></tr>
                            <tr><th scope="col">Equipe adverse :</td><td> <?= $this->nettoyer($rencontres['equipeAdverse']) ?> </td></tr>
                            <tr><th scope="col">Site :</td><td> <?= $this->nettoyer($rencontres['site']) ?> </td></tr>
                            <tr><th scope="col">Terrain : </td><td> <?= $this->nettoyer($rencontres['terrain']) ?> </td></tr>
                            <tr><th scope="col">Heure : </td><td> <?= $this->nettoyer($rencontres['heure']) ?> </td></tr>           
                            <tr><th scope="col">Equipe : </td><td> <?= $this->nettoyer($rencontres['equipe']) ?> </td></tr>                 
                            
                            <tr><th class="text-center" scope="col" colspan="2">Liste des joueurs :</td></tr>
                        </table>                  
                        <?php for( $i=0 ; $i < 14 ; $i++):?>
                            <div class="form-floating mb-3">
                                    <?php echo $i+1; ?>
                                        <select class="form-select" name="idEffectif<?php echo $i;?>,<?php echo $compteurRenc; ?>"  id="floatingSelect" >
                                            <option value="null"> </option>                       
                                            <?php foreach($effectifs as $effectif): ?>
                                                <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>"> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>         
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="floatingSelect">Effectifs</label>
                            </div>
                        <?php endfor; ?>
                       
                    </div>  
                </div>     
            <?php endforeach; ?> 

	 <?php if($compteurRenc >= 1) : ?>
                            <div class="mb-3 text-center">
                                 <input type="hidden" class="form-control"  name="date" id="dateConv" value="<?= $dateChoisi ?>"/>
                                <button type="submit" name="ajout" class="btn btn-primary mb-3">Valider</button>
                            </div>
                        <?php endif; ?>
	
        </form>
    </div>   
</div>
