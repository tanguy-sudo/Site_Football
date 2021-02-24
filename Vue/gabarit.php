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
    <div class="nav-wrapper">
      <a href="" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="convocation/index/">Convocation</a></li>
        <li><a href="">Connexion</a></li>
      </ul>
    </div>
  </nav>
    <body>
        <div id="global">
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
            </footer>
        </div> <!-- #global -->
    </body>
</html>