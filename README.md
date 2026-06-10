# TFG_BarberShop
TFG Creado por Daniel García. Curso: 2025-2026 2ºJ DAW IES Severo Ochoa, Elche.

URL: https://danigarciadev.site/

Usuario Administrador
Correo: admin@barbershop.com
Passwd: 12345678

Usuario Peluquero (1)
Correo: peluqueroprueba1@barbershop.com
Passwd: 12345678

Usuario normal:
Correo: userprueba1@barbershop.com
Passwd: 12345678

Si se quiere ejecutar en local, se debe de crear el .env con los datos necesarios para la conexión con la base de datos, etc.

Además, se debe de dejar en la ruta donde se quiera, y se debe de ejecutar los siguientes comandos:
1. mkdir -p storage/app storage/framework/cache storage/framework/sessions storage/framework/views storage/logs
2. chmod -R 775 storage bootstrap/cache
3. composer install
4. php artisan migrate:fresh --seed --force

El proyecto también incluye un Dockerfile y demás, que lanza los servicios necesarios para su instalación.
