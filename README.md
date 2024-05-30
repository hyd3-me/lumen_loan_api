# lumen_loan_api
## тестовое задание

использованы:
- ubuntu 22.04
- php 8.1.2
- composer 2.7.6
- lumen 10.0.3
- mysql 8.0.36

## установка
### php
- sudo apt install php php-xml

### composer
- php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
- php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
- php composer-setup.php
- php -r "unlink('composer-setup.php');"
- move composer to global env<br>
sudo mv composer.phar /usr/local/bin/composer

### lumen
- composer create-project --prefer-dist laravel/lumen lumen_loan_api
- cd ~/lumen_loan_api/
- php -S localhost:8000 -t public

### mysql
- sudo apt install mysql-server mysql-client
- создать пользователя с паролем и доступом к бд

### edit .env file
- DB_DATABASE=<db_name><br>
DB_USERNAME=<user_name><br>
DB_PASSWORD=<user_pwd>

### edit bootstrap/app.php: uncomment>>
- $app->withFacades();<br>
$app->withEloquent();

### migration
- php artisan make:migration create_loans_table
- modify migration file if need
- php artisan migrate

### make app
- create model
- create routes
- create controller

## реализованные методы

### POST
- /api/v1//loans<br>
curl -i -X POST -H "Content-Type:application/json" http://localhost:8000/api/v1/loans -d '{"amount":"2023"}'

### PUT
- /api/v1//loans/id<br>
curl -H "Content-Type:application/json" -X PUT http://localhost:8000/api/v1/loans/1 -d '{"amount":"2024"}'

### GET by id
- /api/v1//loans/id<br>
curl -i -X GET -H "Content-Type:application/json" http://localhost:8000/api/v1/loans/1

### GET all
- /api/v1//loans
curl -i -X GET -H "Content-Type:application/json" http://localhost:8000/api/v1/loans/

### DELETE
- /api/v1//loans/id<br>
curl -X DELETE http://localhost:8000/api/v1/loans/1

## tests
- getLoans for all loans
- getLoansById for loans by id
- postPostLoans
- putLoans
- deleteLoans