<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Contenu/style.css" />       
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <title><?= $titre ?></title>
    </head>  
    <nav>
        <div class="nav-wrapper teal lighten-2">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
         
            
            <li><a href="collapsible.html">Connexion</a></li>
        </ul>
        </div>
    </nav>
    <body>
        <div id="global">
            <div id="contenu">
                 <div class="row">
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" name="form_connexion">
        
        <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" >
          <label for="email">Email</label>
        </div>
      </div>
      
    
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
     
     	<input type="submit" name="connexion" value="Connexion"  />
    </form>
<?php
	require_once("Framework/Modele.php");
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
		}
	?>       
    
  </div>
                </div> <!-- #contenu -->
            <footer id="piedBlog">
            </footer>
        </div> <!-- #global -->
    </body>
</html>
