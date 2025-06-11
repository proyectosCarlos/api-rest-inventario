
## Instrucciones para configurar localmente

1. Renombra el archivo .env.example por .env
2. Configura las siguientes propiedades de a acuerdo con tu gestor de bases de datos:  

DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

Para esta aplicacion utilice portgreSQL. 

3. (Opcional) Si quieres tener datos de prueba de categorias y productos puedes ejecutar el comando "php artisan db:seed" desde la terminal.

4. Corre la aplicacion desde una terminal con "php artisan serve" y pruebala



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
