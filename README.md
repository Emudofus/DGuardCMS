D-GuardCMS for vEmu
```
 ___          ______  ___ ___    _____    ______      ___
|   \        / ____|  | | | |   /  _  \   |  _  \    |   \
|  _ \   __  || ____  | | | |  |  |_|  |  | |_| /    |  _ \
| |_| | |__| |||_  |  | | | |  |   _   |  |   _ \    | |_| |
|    /       ||__| |  | |_| |  |  | |  |  |  / \ \   |    /
|___/        \_____|   \___/   |__| |__|  |_/   \_\  |___/
```


# Mode d'emploi

## Installation
Le patch SQL se trouve dans `data/sql/schema.sql`.

Vous devez modifier votre fichier apache httpd.conf et ajouter ceci :
```
DocumentRoot "C:\wamp/www/web"
  DirectoryIndex index.php
  <Directory "C:\wamp/www/web">
    AllowOverride All
    Allow from All
  </Directory>

  Alias /sf C:\wamp/www/lib/vendor/symfony/data/web/sf
  <Directory "C:\wamp/www/lib/vendor/symfony/data/web/sf">
    AllowOverride All
    Allow from All
  </Directory>
```
Attention : vous devez modifier la partie `C:\wamp/www/`, c'est le dossier dans lequel CE fichier (README) se trouve.
V�rifiez bien que "web" et "lib" existent dans ce dossier, vous avez fait une erreur sinon.

N'oubliez pas de red�marrer Apache une fois l'�dition termin�e.



## Configuration
Le fichier des base de donn�es est `config/databases.yml`.

Vous pouvez modifier la configuration de base dans apps/frontend/app.yml
Vous pouvez modifier les traductions dans apps/[app]/i18n/fr/messages.xml

Si vous modifiez la configuration, videz le dossier cache/.

Amusez-vous bien !



# How to use?

## Install
The SQL file is `data/sql/schema.sql`.

You have to edit your apache's httpd.conf file and add this :
```
DocumentRoot "C:\wamp/www/web"
  DirectoryIndex index.php
  <Directory "C:\wamp/www/web">
    AllowOverride All
    Allow from All
  </Directory>

  Alias /sf C:\wamp/www/lib/vendor/symfony/data/web/sf
  <Directory "C:\wamp/www/lib/vendor/symfony/data/web/sf">
    AllowOverride All
    Allow from All
  </Directory>
```
Warning : edit the `C:\wamp/www/` path, it's the directory in which THIS file (README) exists.
Be sure that web/ and lib/ exist in this directory, you may have done an error otherwise.

Don't forget to restart Apache after saving the file.

## Configure
The Database info file is `config/databases.yml`.

You can edit basics settings in apps/frontend/app.yml
You can edit translations in apps/[app]/i18n/fr/messages.xml

If you change a setting / change a translation, clear the cache/ directory.

Have fun !
