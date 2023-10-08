## DoubleVPartnersBack

Prueba técnica backed para Double V Partners

## Generalidades

Desarrollada en laravel 10, consta de una api RestFull para la gestion (CRUD) de tickets y un api GraphQL para la gestion de los mismos.
Utiliza servicios resueltos por el serviceContainer de Laravel y ActionClass para tratar de desacoplar los componentes

El proyecto esta montado en docker a través de Laravel Sail

## Poner en marcha

Quiere php > 8.2 y una instalacion de composer con version > 2

Abra una terminal y dirijase al directorio del proyecto,l luego

Ejecute:

`docker-compose up -d`, Esto instalara todo lo necesario para poner en marcha la app laravel

Genere el archivo .env con `cp .env.example .env .env.testing`

Luego corrar las migraciones y siembre algunos datos con `./vendor/bin/sail php artisan migrate:fresh --seed`


## Unit Test

Para correr las pruebas unitarias ejecute `./vendor/bin/sail php artisan test`. Recuerde que esta dentro de un contenedor de docker


## Consumo de api

Puede hacer uso de esta coleccion y desde postman realizar solicitudes segun sea el caso para restFull y graphQL

`https://www.postman.com/thebar70/workspace/rider-404-public-collection/collection/10320542-836f697d-5e25-483b-b708-4718efb14798?action=share&creator=10320542``


# Yison Mosquera - FullStack Developer







