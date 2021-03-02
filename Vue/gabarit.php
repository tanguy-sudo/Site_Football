<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="Contenu/style.css" />
        <link type="text/css" rel="stylesheet" href="Contenu/materialize/css/materialize.min.css"  media="screen,projection"/>
      
       <title><?= $titre ?></title>
    </head>  
    <nav>
      <div class="nav-wrapper">
        <a href="" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">     
        <!-- on regarde si l'utilisateur est connecté -->   
          <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) :?>
            <!-- on teste si l'utilisateur est un entraineur -->
            <?php if($_SESSION['type'] == "entraineur") :?>
              <li><a class="dropdown-trigger" href="#!" data-target="dropdownConvocation">Convocation<i class="material-icons right">arrow_drop_down</i></a></li>                   
              <li><a href="rencontre/index/">Rencontre</a></li>
              <li><a href="effectif/index/">Effectif</a></li>
              <li><a class="dropdown-trigger" href="#!" data-target="dropdownAbsence">Absence<i class="material-icons right">arrow_drop_down</i></a></li>                   
            <!-- on teste si l'utilisateur est le secretaire -->
            <?php elseif($_SESSION['type'] == "secretaire") : ?>
              <li><a href="convocation/index/">Convocation</a></li>
              <li><a class="dropdown-trigger" href="#!" data-target="dropdownRencontre">Rencontre<i class="material-icons right">arrow_drop_down</i></a></li>                   
              <li><a class="dropdown-trigger" href="#!" data-target="dropdownEffectif">Effectif<i class="material-icons right">arrow_drop_down</i></a></li>                   
              <li><a class="dropdown-trigger" href="#!" data-target="dropdownAbsence">Absence<i class="material-icons right">arrow_drop_down</i></a></li>                   
            <?php endif; ?>
            <li><a href="connexion/deconnect/">Deconnexion</a></li> 
          <!-- menu si l'utilisateur n'est pas connecté -->
          <?php else: ?>
            <li><a href="convocation/index/">Convocation</a></li>
            <li><a href="rencontre/index/">Rencontre</a></li>
            <li><a href="absence/index/">Absence</a></li>
            <li><a href="connexion/index/">Connexion</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <!-- Dropdown Structure absence-->
    <ul id="dropdownAbsence" class="dropdown-content">
      <li><a href="absence/ajoutAbsence/">Ajouter une absence</a></li>
      <li class="divider"></li>
      <li><a href="absence/index/">Voir les absences</a></li>
    </ul>
    <!-- Dropdown Structure convocation-->
    <ul id="dropdownConvocation" class="dropdown-content">
      <li><a href="#!">Ajouter une convocations</a></li>
      <li class="divider"></li>
      <li><a href="convocation/index/">Voir les convocations</a></li>
    </ul>
    <!-- Dropdown Structure rencontre-->
    <ul id="dropdownRencontre" class="dropdown-content">
      <li><a href="rencontre/ajoutRencontre/">Ajouter une rencontre</a></li>
      <li class="divider"></li>
      <li><a href="rencontre/index/">Voir les rencontres</a></li>
    </ul>
    <!-- Dropdown Structure effectif-->
    <ul id="dropdownEffectif" class="dropdown-content">
      <li><a href="effectif/ajoutEffectif/">Ajouter un effectif</a></li>
      <li class="divider"></li>
      <li><a href="effectif/index/">Voir les effectifs</a></li>
    </ul>
    <body>
      <div id="global">
        <div class="container margin-h">
          <?= $contenu ?>
        </div>
      </div>
      <footer class="page-footer">
        <div class="footer-copyright">
          <div class="container">
            Copyright © <?= date('Y'); ?>  Site football
          </div>
        </div>
      </footer>
    </body>
<script type="text/javascript" src="Contenu/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="Contenu/script.js"></script>
</html>
