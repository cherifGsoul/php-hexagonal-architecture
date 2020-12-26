# php-hexagonal-architecture
Implementing Hexagonal Architecture using PHP

## Steps to start the workshop

The code is designed by using [PHPSpec](http://www.phpspec.net), a SpecBDD tool.

1. Clone the repository
2. Install dependencies: `$ composer install`
3. Run the specs (tests): `$ vendor/bin/phpspec run`

### Run Symfony application:
1. Run a PHP static server (or apache if you will): `$ php -S localhost:8000 -t public`
2. Open the app in the browser: `localhost:8000`
3. In the browser try with `localhost:8000/mouse` to see the price of a product with added taxes 