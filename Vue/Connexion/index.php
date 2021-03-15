<?php $this->titre = "Connexion"; ?>
    
<div class="row margin-row">
	<form class="row g-3 needs-validation" method="post" action="connexion/connex/" name="form_connexion">
		<div class="form-floating mb-3">
			<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required name="Email" >
			<label for="floatingInput">Email</label>
		</div>
		<div class="form-floating mb-3">
			<input type="password" class="form-control" id="floatingPassword" placeholder="Password" required name="motDePasse">
			<label for="floatingPassword">Mot de passe</label>
		</div>
		<div class="mb-3">
			<button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
		</div>
	</form>	
</div>

<?php

if(isset($_SESSION['connErr'])){
	echo"              
	<div id='myToast'>
		<div class='d-flex justify-content-center'>    
			<div class='toast-body'>
				Adresse email ou mot de passe erroné
			</div>
		</div>
	</div>
	";
	echo"<script> toastFunction(); </script>";
	unset($_SESSION['connErr']);
}

?>