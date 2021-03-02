<?php $this->titre = "Rencontre"; ?>

<div class="row center">
    <form class="col s12" method="post" action="rencontre/valideRencontre/">
      <div class="row">
        <div class="input-field col s6">
          <input id="Categorie" type="text" class="validate" name="categorie" required>
          <label for="Categorie">Categorie</label>
        </div>
        <div class="input-field col s6">
            <select id="competition" name="competition" class="validate" required>
              <?php foreach($competitions as $competition): ?>
                <option value="<?= $competition ?>"><?= $competition ?></option>         
              <?php endforeach; ?>
            </select>
            <label for="competition">Competition</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="Equipe" type="text" class="validate" name="Equipe" required>
          <label for="Equipe">Equipe</label>
        </div>
        <div class="input-field col s6">
          <input id="EquipeAdv" type="text" class="validate" name="EquipeAdv" required>
          <label for="EquipeAdv">Equipe adverse</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
                <input type="text" class="datepicker" id="dateRenc" name="date" required>  
                <label for="dateRenc">Date</label>
        </div>
        <div class="input-field col s6">
                <input id="heure" type="text" class="validate timepicker" required name="heure">
                <label for="heure">Heure</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="terrain" type="text" class="validate" name="terrain" required>
          <label for="terrain">Terrain</label>
        </div>
        <div class="input-field col s6">
          <input id="site" type="text" class="validate" name="site" required>
          <label for="site">Site</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input class="btn waves-effect waves-light" type="submit" value="valider">
        </div>
      </div>
    </form>
  </div>
        