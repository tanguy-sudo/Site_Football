## Table des matières
1. [Info générale](#info-générale)
2. [Technologies](#technologies)
3. [Installation](#installation)
4. [Collaboration](#collaboration)
5. [FAQs](#faqs)
### Info Générale
***
Ce projet a été réalisé dans le cadre de ma formation en licence informatique à l'université d'Angers en 3ème années pour le cours de développement web. 
### Screenshot
![Image text](Contenu/images/readmeImage.png)
## Technologies
***
Liste des technologies utilisées dans le projet :
* [PHP](https://www.php.net/): Version 7.4.9 
* [JavaScript](https://developer.mozilla.org/fr/docs/Web/JavaScript): Version 1.7
* [jQuery](https://jquery.com/): Version 3.5.1
* [Composer](https://getcomposer.org/):Version  1.7.3
* [Git](https://git-scm.com/): Version 2.30.0
* [GitKraken](https://www.gitkraken.com/) Version 7.5.2
* [MySql](https://www.mysql.com/fr/) Version 8.0.21

## Installation
***
Pour installer le projet vous pouvez le cloner avec une clé SSH, ou bien télécharger le dossier ZIP.
```
$ git clone git@github.com:tanguy-sudo/Site_Football.git

```
Vous devez Importer la base de données se trouvant dans le dossier ```BD``` du projet, celle-ci contient déjà l'instruction ```CREATE DATABASE```.

Vous devez configurer les fichiers ```dev.ini``` et ```prod.ini``` dans le dossier ```Config``` du projet en y mettant l'identifiant et le mot de passe de la base de données.

Sur le site vous pouvez vous connecter en tant que ```Entraîneur``` ou ```Secrétaire```

**Entraîneur**

Identifiant : ```aurelien.brosseau@hotmail.com``` 
mot de passe : ```mdpaurelien```
 
**Secrétaire**

Identifiant : ```frank.gaudreau@hotmail.com``` 
mot de passe : ```mdpfrank``` 
## Collaboration
***
Ce projer a été réalisé en collaboration avec Tanguy JOUVIN et Dorian LETORT.
## FAQs
***
Une liste de questions fréquemment posées :
1. **Le fichier CSV ne s'importe pas.**
le fichier CSV doit contenir comme séparateur un ```;```. 
2. **Les données importées via un fichier CSV ne s'affichent pas.** 
Il faut parfois rafraichir la page de visualisation des rencontres après l'import pour correctement les visualiser.
