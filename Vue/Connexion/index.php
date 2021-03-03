<?php $this->titre = "Connexion"; ?>
    
<div class="row">
	<form class="row g-3 needs-validation" method="post" action="connexion/connex/" name="form_connexion">
		<div class="form-floating mb-3">
			<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="Email" required>
			<label for="floatingInput">Email</label>
		</div>
		<div class="form-floating mb-3">
			<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="motDePasse" required>
			<label for="floatingPassword">Mot de passe</label>
		</div>
		<div class="mb-3">
			<button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
		</div>
	</form>
</div>