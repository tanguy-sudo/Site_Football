<?php $this->titre = "Effectif"; ?>


<div class="row margin-row">
    <form class="row g-3" method="post" action="effectif/valideEffectif/">
      <div class="form-floating mb-3">
        <input id="nom" class="form-control" type="text" required name="nom">
        <label for="nom">Nom</label>
      </div>
      <div class="form-floating mb-3">
        <input id="Prenom" class="form-control" type="text" required name="prenom">
        <label for="Prenom">Prenom</label>
      </div>
      <div class="form-floating mb-3">
        <input id="typeLicence" class="form-control" type="text" required name="typelicence">
        <label for="typeLicence">Type de licence</label>
      </div>
      <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="Licencie" required>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>      
                    </select>
                    <label for="floatingSelect">Licencié</label>
      </div>
      <div class="mb-3">
      <button type="submit" name="ajoutAbs" class="btn btn-primary">valider</button>
      </div>
    </form>
  </div>