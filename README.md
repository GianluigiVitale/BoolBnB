# BoolBnB

BoolBnB is an application to find and manage apartment rentals. Users who want to rent an apartment once registered can create an ad. Users interested in an apartment, using the filters of a search page, see a list of possible apartments and by clicking on each one it's possible to see a detailed page. The user can contact the owner to ask questions. In addition, the owners of an apartment can pay to sponsor the ad of an apartment to make it more visible.

## Short video of the project

[BoolBnb Video](video/boolbnb.mp4)

### TEAM

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
