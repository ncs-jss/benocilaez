# Zealicon Backoffoice

[![Build Status](https://travis-ci.org/ncs-jss/benocilaez.svg?branch=master)](https://travis-ci.org/ncs-jss/benocilaez)

This is the backoffice for the Zealicon (tech-culture fest of JSSATEN). It is used to store and extract details of events, winner of events & member of societies.


## Branch Structure
* ``master`` branch contains code with frontend in Angular & backend in Laravel with Rest APIs.
* ``skip-code`` branch contains code which are ready to publish via templating in Laravel

## Server Requirements
-   Node.js version 8.x or 10.x
-   npm package manager
-   PHP >= 7.1.3
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Mbstring PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   Ctype PHP Extension
-   JSON PHP Extension
-   BCMath PHP Extension

## Installing

Clone this repo or download it on your local system.

### Frontend

```shell
cd client
```

Run angular deployment server

```shell
ng serve
```

This project will by default run on this server:

```
http://localhost:4200/
```

### Backend

```shell
cd server
```

Open composer and run this given command.

```shell
composer install
```

Rename the file `.env.example` to `.env`.

```shell
cp .env.example .env
```

Generate the Application key

```php
php artisan key:generate
```

Set DB credentials, InfoConnect API URL and App Name in `.env`

Migrate the database.

```php
php artisan migrate
```

Seed the database

```php
php artisan db:seed
```

Set project URL in app/Helpers/custom_url.php
For example "http://localhost/beaconzialis/server/public/"

To run this project on development server

```php
php artisan serve
```

This project will by default run on this server:

```
http://localhost:8000/
```

For more details
```php
php artisan serve --help
```

# Contribution

Folk this repository

In your folked repo create new branch

Make changes in your branch

Make a pull request
