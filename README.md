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
