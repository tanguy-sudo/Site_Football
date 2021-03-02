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
      <li><a href="#!">Ajouter une rencontre</a></li>
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
               <!-- <img src="data:image/jpeg;base64,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" width="100%" height="100%" alt=""> -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
            </footer>
        </div> <!-- #global -->
    </body>
    <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
              Copyright © <?= date('Y'); ?>  Site football
            </div>
          </div>
    </footer>
</html>
<script type="text/javascript" src="Contenu/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="Contenu/script.js"></script>