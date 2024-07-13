## About API DICROMO

API DICROMO permite realizar las siguientes tareas.

- **Autenticación de Usuarios**: sistema de autenticación utilizando JWT.
- **Gestión de Usuarios**: registro, inicio de sesión, visualización, edición y eliminación de usuarios.
- **Gestión de Tareas**: Permite a los usuarios crear, leer, actualizar y eliminar tareas.
- **Uso de MongoDB**: Almacenar algunas colecciones en MongoDB.
- **Pruebas Unitarias**: Ejecutar pruebas unitarias para asegurar la calidad del código.

## Detalles Tecnicos
- Laravel 8
- PHP 7.4
- MySql
- MongoDB
- Dependencias utilizadas en laravel
    - tymon/jwt-auth
    - nwidart/laravel-modules
    - jenssegers/mongodb
    - squizlabs/php_codesniffer
    - friendsofphp/php-cs-fixer

## Pasos y Comandos Basicos para correr el proyecto (sin Docker)

1. Clonar el repositorio del proyecto (por HTTPS o SSH)
    - git clone https://github.com/BenicioDonata/dicromo.git
    - git clone git@github.com:BenicioDonata/dicromo.git
2. Copiar .env.example en el raiz del proyecto como .env
3. Crear la DB **dicromo_db** con el usuario y pass del .env en mysql
4. Ejecutar **composer install** para instalar dependencias
5. Ejecutar **php artisan migrate** para obtener las tablas de las migraciones
6. Los datos de la DB de MONGO se encuentran en el .env (DB externa con un usuario para dicromo)
7. Ejecutar **php artisan serve** para levantar el servidor y comenzar las pruebas con postamn
8. Para correr los test unitarios ejecutar **php artisan test**
9. Para realizar comprobaciones de tabulacione sy formatos de codigo ejecutar **./vendor/bin/php-cs-fixer fix**

## Pruebas de API Dicromo por Postman

- Dentro de la carpeta tests/Postman se encuentra una collection para importar y testear la API DICROMO como asi tambien ver los resultados de ejemplos de cada endpoinit.
(API DICROMO.postman_collection.json)
 

