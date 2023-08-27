## Requisitos
- PHP 8.* 
- Laravel 10
- Composer
- Git
- No se requiere base de datos

## Instalación
- git clone https://github.com/pablohernandez1983/test_php.git
- composer install 


## Ejercicio 1
El ejercicio 1 es una aplicación de consola de laravel, para ejecutar la aplicación use lo siguiente:


- php artisan app:rentas
- A continuación la aplicacíon mostrara en consola el resultado segun las reglas indicadas del ejercicio.
- El código del programa esta en: test_php\app\Console\Commands\Rentas.php
- Para cambiar el estado de los depertamentos, ubicar la linea 53

## Ejercicio 2
El ejercicio 2 es una aplicación de consola de laravel, para ejecutar la aplicación use lo siguiente:


- php artisan dusk
- A continuación la aplicacíon mostrara en consola el resultado siguiente: PASS  Tests\Browser\ExampleTest
- Las imagenes se decargan en ls siguiente ruta: test_php\storage\app\715825575916402712 
- El código se encuentra en el siguiente archivo: test_php\tests\Browser\ExampleTest.php
- Para el desarrollo de esta aplicación se utilizo el componente Dusk de laravel: https://laravel.com/docs/10.x/dusk
