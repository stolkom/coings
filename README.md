# Coings

Laravel 8 based simple app

## Requirements

 - PHP 7.3+
 - MySQL 5.7+ or MariaDB 10.3+
 - Node.js 17.2+
 - NPM 8.3+

## Installation

Clone the repository:
```
git clone git@github.com:stolkom/coings.git
```
Copy `.env.example` file to `.env`. Configure you database connection in the `.env` file. Then update config:
```
php artisan config:cache
```

Install required packages using composer:
```
composer install
```

Generate the APP KEY:
```
php artisan key:generate
```

Run database migrations with following command:
```
php artisan migrate
```

Next, you should create the encryption keys needed to generate secure access tokens. Run this command for that:
```
php artisan passport:install
```

If you want to fill the database with test data use the following command:
```
php artisan db:seed
```
it will create some test data and a user with email `admin@example.com` and password `admin1234`.

Install required node modules with npm:
```
npm install
```

Compile the assets with one of the following commands:
```
npm run dev
```
or
```
npm run production
```