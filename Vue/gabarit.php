<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="Contenu/script.js"></script>
        <link type="text/css" rel="stylesheet" href="Contenu/style.css" />
        <link type="text/css" rel="stylesheet" href="Contenu/bootstrap/css/bootstrap.min.css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
      
       <title><?= $titre ?></title>
    </head>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand logo" href=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
              <!-- on regarde si l'utilisateur est connecté -->   
              <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) :?>
                <!-- on teste si l'utilisateur est un entraineur -->
                <?php if($_SESSION['type'] == "entraineur") :?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle test" id="dropdownConvocation" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Convocation
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownConvocation">
                      <li><a class="dropdown-item" href="convocation/ajoutConvocation/">Ajouter une convocations</a></li>
                      <li><a class="dropdown-item" href="convocation/index/">Voir les convocations</a></li>
                    </ul>
                  </li>                   
                  <li class="nav-item"><a id="navRenc" class="nav-link" href="rencontre/index/">Rencontre</a></li>
                  <li class="nav-item"><a id="navEff" class="nav-link" href="effectif/index/">Effectif</a></li>                  
                <!-- on teste si l'utilisateur est le secretaire -->
                <?php elseif($_SESSION['type'] == "secretaire") : ?>
                  <li class="nav-item"><a id="navConv" class="nav-link" href="convocation/index/">Convocation</a></li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownRencontre" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Rencontre
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownRencontre">
                      <li><a class="dropdown-item" href="rencontre/importDonnee/">Importer des rencontres</a></li>
                      <li><a class="dropdown-item" href="rencontre/ajoutRencontre/">Ajouter une rencontre</a></li>
                      <li><a class="dropdown-item" href="rencontre/index/">Voir les rencontres</a></li>
                    </ul>
                  </li>  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownEffectif" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Effectif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownEffectif">
                      <li><a class="dropdown-item" href="effectif/ajoutEffectif/">Ajouter un effectif</a></li>
                      <li><a class="dropdown-item" href="effectif/index/">Voir les effectifs</a></li>
                    </ul>
                  </li>  
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownAbsence" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Absence
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownAbsence">
                      <li><a class="dropdown-item" href="absence/ajoutAbsence/">Ajouter une absence</a></li>
                      <li><a class="dropdown-item" href="absence/index/">Voir les absences</a></li>
                    </ul>
                </li>  
                <li class="nav-item"><a class="nav-link" href="connexion/deconnect/">Deconnexion</a></li>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?= ucfirst($_SESSION['type']); ?></a>
              <!-- menu si l'utilisateur n'est pas connecté -->
              <?php else: ?>
                <li class="nav-item"><a id="navConv" class="nav-link" href="convocation/index/">Convocation</a></li>
                <li class="nav-item"><a id="navRenc" class="nav-link" href="rencontre/index/">Rencontre</a></li>
                <li class="nav-item"><a id="navCon" class="nav-link" href="connexion/index/">Connexion</a></li>
              <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <body>
      <div id="global">
        <div class="container-fluid bg-gabarit">
          <?= $contenu ?>
        </div>
      </div>
      <footer class="footer mt-auto py-3 bg-dark">
        <div class="container p-4">
          <div class="text-center p-3">
            <span class="text-white">Copyright © <?= date('Y'); ?> Site football</span>  
          </div>
        </div>
      </footer>
    </body>
</html>
