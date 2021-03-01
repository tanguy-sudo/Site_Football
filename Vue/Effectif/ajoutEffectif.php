<?php $this->titre = "Effectif"; ?>


<div class="row">
    <form class="col col s12" method="post" action="effectif/valideEffectif/">
      <div class="row">
        <div class="input-field col s4 offset-s4">
          <input id="nom" type="text" class="validate" required name="nom">
          <label for="nom">Nom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s4">
          <input id="Prenom" type="text" class="validate" required name="prenom">
          <label for="Prenom">Prenom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s4">
          <input id="typeLicence" type="text" class="validate" required name="typelicence">
          <label for="typeLicence">Type de licence</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s4">
          <input class="btn waves-effect waves-light" type="submit" value="valider">
        </div>
      </div>
    </form>
  </div>