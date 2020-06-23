# BoolBnB

Realization of a complex Web application inspired by Airbnb, formed by Backend (Multi-auth Users and Roles, Payment Provider Integration and Geolocation API) and responsive Frontend interface.

## Project Link

https://docs.google.com/document/d/1e-d1SooTchMUuL8FEYiv51h47b56uHwEs68NH1EeIEc

## TEAM
### Class 10 - Group 3

- Federico Bartoli
- Michael Hernandez
- Lorenzo Palumbo
- Kevin Panacci
- Gianluigi Vitale

## Installation

```sh
$ git clone https://github.com/GianluigiVitale/BoolBnB.git
$ composer install
$ npm install
$ cp .env.example .env
```

Create new Database, and insert db data in .env file as follow:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=your_user
DB_PASSWORD=your_password

BRAINTREE_ENV=sandbox
BRAINTREE_MERCHANT_ID=your_id
BRAINTREE_PUBLIC_KEY=your_public_key
BRAINTREE_PRIVATE_KEY=your_private_key
```

Generate your key:

```sh
$ php artisan key:generate
```

Run the migrations

```sh
$ php artisan migrate
```

Run the seeder

```sh
$ php artisan db:seed
```
