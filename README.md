# Fergus Technical Test

## Dependencies

* PHP 8.1
* Composer
* Docker

## Getting started

Run the below code to clone the repository, enter it, and install it with seed data


```bash
git clone https://github.com/anthony-kyle/ftt.git
cd ./ftt
cp .env.example .env
composer install
./vendor/bin/sail up -d
./vendor/bin/artisan migrate --seed
```