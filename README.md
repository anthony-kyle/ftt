# Fergus Technical Test

## Dependencies

* PHP 8.1
* Composer
* Docker

## Getting started

Run the below code to clone the repository, enter it, and install it with seed data


```bash
git clone https://github.com/anthony-kyle/ftt.git akm-technical-test
cd ./akm-technical-test
cp .env.example .env
composer install
./vendor/bin/sail up -d
```

Once the above is running successfully, migrate and seed the database
```bash
./vendor/bin/sail artisan migrate --seed
```

View the running system http://localhost:8081