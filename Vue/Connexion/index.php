<?php $this->titre = "Connexion"; ?>
    
<div class="row">
    <form method="post" action="connexion/connex/" name="form_connexion">     
        <div class="row">
        	<div class="input-field col s12">
          		<input id="email" type="email" name="Email" >
          		<label for="email">Email</label>
        	</div>
        </div>
      	<div class="row">
        	<div class="input-field col s12">
          		<input id="password" type="password" class="validate" name="motDePasse">
          		<label for="password">Password</label>
        	</div>
        </div>
     	<button type="submit" name="connexion" class="btn waves-effect waves-light">Connexion</button>
    </form>
</div>
<?php
/*	require_once("Framework/Modele.php");
	$pdo= getBdd();
	if(!! empty($_POST['email']) && ! empty($_POST['password'])){
	try{$email=$pdo->quote($_POST['email']);
		$password=$pdo->quote($_POST['password']);
		
		
		$query="select MotDePasse From utilisateur where Adresseemail=$email";
		if($password==$pdo->executerRequete($query)){
			$query="select type from utlisateur where Adressemail=$email";
			if($pdo->executerRequete($query)=="secretaire") 
			{
	//connexion en tant que secretaire
			}	else {
		//connexion en tant que entraineur		
						} 
		}
		else {
		//connexion en tant que visiteur 			
		}
	}
	catch (PDOException $e) {
        displayException($e);
        exit();
    }		
		} */
	?>       