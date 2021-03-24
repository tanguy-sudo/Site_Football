<?php $this->titre = "Rencontre"; ?>

<div class="row margin-row">
    <form class="row g-3" method="post" action="rencontre/UpdateRencontre/">
    <div class="form-row">
      <div class="row mb-3">
        <div class="form-floating col-md-6">
          <input id="Categorie" type="text" class="form-control" name="categorie" value="<?= $this->nettoyer($rencontre['categorie']) ?>" required disabled>
          <label for="Categorie">Catégorie</label>
        </div>    
        <div class="form-floating col-md-6">
            <select id="competition" name="competition" class="form-select" required disabled>
                <option value="<?= $this->nettoyer($rencontre['competition'])?>" selected><?= $this->nettoyer($rencontre['competition'])?></option>         
            </select>
            <label for="competition">Compétition</label>
        </div>
      </div>
      
      <div class="row mb-3">
        <div class="form-floating col-md-6">
          <input id="Equipe" type="text" class="form-control" name="Equipe" value="<?= $this->nettoyer($rencontre['equipe']) ?> " required disabled>
          <label for="Equipe">Equipe</label>
        </div>
        <div class="form-floating col-md-6">
          <input id="EquipeAdv" type="text" class="form-control" name="EquipeAdv" value="<?= $this->nettoyer($rencontre['equipeAdverse']) ?>" required>
          <label for="EquipeAdv">Equipe adverse</label>
        </div>
      </div>

      <div class="row mb-3">
        <div class="form-floating col">
                <input type="date" class="form-control" name="date" id="dateRenc" value="<?= $this->nettoyer($rencontre['date']) ?>" required> 
                <label for="dateRenc">Date</label>
        </div>
        <div class="form-floating col">
                <input type="time" class="form-control" name="heure" id="heure" value="<?= $this->nettoyer($rencontre['heure']) ?>" required>
                <label for="heure">Heure</label>
        </div>
      </div>

      <div class="row mb-3">
        <div class="form-floating col">
          <input id="terrain" type="text" class="form-control" name="terrain" value="<?= $this->nettoyer($rencontre['terrain']) ?>" required>
          <label for="terrain">Terrain</label>
        </div>
        <div class="form-floating col">
          <input id="site" type="text" class="form-control" name="site" value="<?= $this->nettoyer($rencontre['site']) ?>" required>
          <label for="site">Site</label>
        </div>
      </div>

      <input type="hidden" name="id" value="<?= $rencontre['id_rencontre'] ?>"/>

      <div class="row mb-3">
        <div class="mb-3">
          <button class="btn btn-primary" type="submit" name="valider">valider</button>
        </div>
      </div>
</div>
    </form>
  </div>
        