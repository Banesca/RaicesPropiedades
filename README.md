# RaicesPropiedades


CREAR BASE DE DATOS MYSQL LOCAL (obligatorio)
CREATE DATABASE webraices;

ACTIVACION DE LARAVEL (BACKEND)
composer install


php artisan migrate --seed

php artisan passport:install

php artisan passport:client --personal

php artisan storage:link

php artisan serve


PUERTO POR DEFAULT http://localhost:8000/

ACTIVACION DE ANGULAR (FRONTEND)
Requisitos: tener instalado nodejs

npm install -g @angular/cli

pasar al front y ejecutar lo siguiente

npm install

ng serve | npm start

PUERTO POR DEFAULT http://localhost:4200/

ACTIVACION DE ANGULAR (FRONTEND DEL BACKEND)
npm install

ng serve --port 5200

PUERTO POR DEFAULT http://localhost:5200/


----- solucion errores comunes ----

ERROR 
Syntax error or access violation: 1118 Row size too large (> 8126). Changing some columns to TEXT or BLOB may help. In current row format, BLOB prefix of 0 bytes is stored inline.")

SOLUCION
EJECUTAR ESTOS COMANDO Y LUEGO LAS MIGRASIONES 
SET GLOBAL innodb_default_row_format='dynamic';
SET GLOBAL innodb_strict_mode=OFF;
