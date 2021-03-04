<?php $this->titre = "Rencontre"; ?>

<div class="row margin-row">
    <form class="row g-3" method="post" action="rencontre/valideRencontre/">
    <div class="form-row">
      <div class="row mb-3">
        <div class="form-floating col-md-6">
          <input id="Categorie" type="text" class="form-control" name="categorie" required>
          <label for="Categorie">Catégorie</label>
        </div>    
        <div class="form-floating col-md-6">
            <select id="competition" name="competition" class="form-select" required>
              <?php foreach($competitions as $competition): ?>
                <option value="<?= $competition ?>"><?= $competition ?></option>         
              <?php endforeach; ?>
            </select>
            <label for="competition">Compétition</label>
        </div>
      </div>
      
      <div class="row mb-3">
        <div class="form-floating col-md-6">
          <input id="Equipe" type="text" class="form-control" name="Equipe" required>
          <label for="Equipe">Equipe</label>
        </div>
        <div class="form-floating col-md-6">
          <input id="EquipeAdv" type="text" class="form-control" name="EquipeAdv" required>
          <label for="EquipeAdv">Equipe adverse</label>
        </div>
      </div>

      <div class="row mb-3">
        <div class="form-floating col">
                <input type="date" class="form-control" name="date" id="dateRenc" required> 
                <label for="dateRenc">Date</label>
        </div>
        <div class="form-floating col">
                <input type="time" class="form-control" name="heure" id="heure" required>
               <!-- <input id="heure" type="text" class="form-control timepicker" required name="heure">-->
                <label for="heure">Heure</label>
        </div>
      </div>

      <div class="row mb-3">
        <div class="form-floating col">
          <input id="terrain" type="text" class="form-control" name="terrain" required>
          <label for="terrain">Terrain</label>
        </div>
        <div class="form-floating col">
          <input id="site" type="text" class="form-control" name="site" required>
          <label for="site">Site</label>
        </div>
      </div>

      <div class="row mb-3">
        <div class="mb-3">
          <button class="btn btn-primary" type="submit" name="valider">valider</button>
        </div>
      </div>
</div>
    </form>
  </div>
        