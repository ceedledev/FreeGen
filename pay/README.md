Créer un fichier nommé `.htaccess` dans ce dossier et met sa:

```
Options All -Indexes

ErrorDocument 400 /erreurs.php?erreur=400
ErrorDocument 401 /erreurs.php?erreur=401
ErrorDocument 403 /erreurs.php?erreur=403
ErrorDocument 404 /erreurs.php?erreur=404
ErrorDocument 500 /erreurs.php?erreur=500

RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^([a-zA-Z-]+)$ $1.php
RewriteRule ^starter/([a-zA-Z-]+)$ starter.php?method=$1
RewriteRule ^pro/([a-zA-Z-]+)$ pro.php?method=$1
RewriteRule ^giant/([a-zA-Z-]+)$ giant.php?method=$1
RewriteRule ^confirm/([a-zA-Z-]+)$ confirm/$1.php
```
