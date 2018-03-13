# Panel Rejestracji Budżet obywatelski

Panel do zbierania informacji od wylosowanych osób.
# Wymagania
- Baza danych MySQL 5.5.x lub wyższa
- PHP 7.0 lub wyższy
- Apache2 lub Nginx

Dla **Apache2**
```apache2
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ web/$1

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ web/index.php [QSA,L]
```
Dla **Nginx**
```
location / {
    root   /home/[project_path]/htdocs/web;
    index  index.html index.php index.htm;
    if (!-e $request_filename) {
        rewrite ^/(.*)$ /index.php?q=$1 last;
    }
}
location ~ .php$ {
    try_files $uri = 404;
    fastcgi_pass 127.0.0.1:9000;
    fastcgi_index web/index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

# Instrukcja postawienia panelu
W poniższych krokach, są opisane niezbędne czynności do postawienia i konfiguracji panelu

## Instalacja 
```bash  
composer create-project budzetobywatelski/rejestracja
```

## Baza danych
Tworzymy bazę danych na swoim serwerze. Następnie przechodzimy do projektu do pliku
```bash  
app/.sql/tables.sql
```

Importujemy go do swojej bazy, lub wklejamy w zapytanie.
### Konfiguracja bazy w projekcie
Przechodzimy do pliku 
```bash 
web/config.php
```

I uzupełniamy kolejno pola, danymi naszej bazy
```php 
// Database configuration
define('DB_HOST', ""); // Database Host (localhost)
define('DB_USER', ""); // Database Username
define('DB_PASS', ""); // Database Password
define('DB_DATABASE', ""); // Database Name
```

Baza i połączenie do bazy zostało prawidłowo skonfigurowane.
### Konfiguracja terminów wyświetlanych na stronie głównej
W tym celu przechodzimy do nowo utworzonej tabeli **deadlines** i dodajemy daty według własnego uznania.
## Konfiguracja włączenia rejestracji 
Aby zmienić datę rozpoczęcia i zakończenia rejestracji, przechodzimy do pliku
```bash 
app/Config/options.php
```

A następnie zmieniamy w sekcji **register** wartości **start** i **end**
```php 
'start' => '2018-02-22',
'end' => '2018-04-20'
```

## Importowanie CSV z osobami do systemu
Aby zaimportować listę osób, z danymi do logowania, musimy włączyć i skonfigurować stronę importu. W tym celu przechodzimy do pliku
```bash 
app/Config/import.php
```

A następnie zmieniamy opcję **allow** na **true**, a **user** i **password** konfigurujemy według własnego uznania
```php 
 'import' => array(
	'allow' => true,
        'user' => 'user',
        'password' => 'CHANGE_ME' 
    )
```
Następnie przechodzimy na link http://naszadomena/page/importCSV i wybieramy nasz plik CSV, potwierdzając **Prześlij**.
Po prawidłowym przesłaniu pliku ukaże nam się komunikat
```bash 
Status importu: Array ([errors] => 0 [success] => 13)
```

Przedstawiający status wykonanej operacji.
Na koniec cofamy ustawienie **true** w 
```bash 
app/Config/import.php
```

na **false**, blokując dostęp do podstrony.

```php 
 'import' => array(
	'allow' => false,
        'user' => 'user',
        'password' => 'CHANGE_ME' 
    )
```