Установить любой локальный веб-сервер(Например xampp,OSPanel и тд)*

установить Composer https://getcomposer.org *

Установить node Js для сборки laravel^11 версий*

Запустить локальный веб-сервер (mysql, apache)*

Настройка .env* Если нет фала .env то делаем следующее действие дублируем .env.example и сокрощаем одну из них до .env

в .env вставляем следующие данные

DB_CONNECTION=mysql // Тип БД 
DB_HOST=127.0.0.1 
DB_PORT=3306 DB_DATABASE=laravel // Имя БД
DB_USERNAME=root
DB_PASSWORD=  

Черезь консоль локального веб-сервера зайти в папку с проектом
ввести по очереди следующие команды 
npm install или npm i 
composer install 
php aritsan serve

Открыть новую консоль с той же папки и выполнить следующие команды
php artisan migrate
npm run dev
