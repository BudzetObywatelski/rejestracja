# Panel Rejestracji Budżet obywatelski

Panel do zbierania informacji od wylosowanych osób.
# Wymagania
- Baza danych MySQL 5.5.x lub wyższa
- PHP 7.0 lub wyższy
- Apache2 lub Nginx

# Instrukcja postawienia panelu
W poniższych krokach, są opisane niezbędne czynności do postawienia i konfiguracji panelu
## Baza danych
Tworzymy bazę danych na swoim serwerze. Następnie przechodzimy do projektu do pliku
> app/.sql/tables.sql

Importujemy go do swojej bazy, lub wklejamy w zapytanie.
### Konfiguracja bazy w projekcie
Przechodzimy do pliku 
>web/config.php

I uzupełniamy kolejno pola, danymi naszej bazy
>// Database configuration
define('DB_HOST', ""); // Database Host (localhost)
define('DB_USER', ""); // Database Username
define('DB_PASS', ""); // Database Password
define('DB_DATABASE', ""); // Database Name

Baza i połączenie do bazy zostało prawidłowo skonfigurowane.
### Konfiguracja terminów wyświetlanych na stronie głównej
W tym celu przechodzimy do nowo utworzonej tabeli **deadlines** i dodajemy daty według własnego uznania.
## Konfiguracja włączenia rejestracji 
Aby zmienić datę rozpoczęcia i zakończenia rejestracji, przechodzimy do pliku
>app/Config/options.php

A następnie zmieniamy w sekcji **register** wartości **start** i **end**
>'start' => '2018-02-22',
>'end' => '2018-04-20'

## Importowanie CSV z osobami do systemu
Aby zaimportować listę osób, z danymi do logowania, musimy przejść do pliku
>web/config.php

Znaleźć wartość 
>define('ALLOW_IMPORT', false); //setting allow to import CSV

I zmienić jej ustawienie na **true**
Następnie przechodzimy na link http://naszadomena/page/importCSV i wybieramy nasz plik CSV, potwierdzając **Prześlij**.
Po prawidłowym przesłaniu pliku ukaże nam się komunikat
>Status importu:Array ( \[errors\] => 0 \[success\] => 13 )

Przedstawiający status wykonanej operacji.
Na koniec cofamy ustawienie **true** w **web/config.php** na **false**, blokując dostęp do podstrony.