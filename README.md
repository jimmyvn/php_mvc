Create new file `.htaccess` and add below code to that file.
```
RewriteEngine On

#RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-l

RewriteRule ^(.+)$ index.php?controller=$1
```