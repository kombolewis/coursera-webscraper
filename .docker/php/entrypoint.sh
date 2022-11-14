#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install
fi

if [ ! -f ".env" ]; then
    echo "Creating env file"
    cp .env.example .env
else
    echo "env file exists"
fi
apt install firefox-esr --yes
composer require --dev dbrekelmans/bdi && vendor/bin/bdi detect drivers
php -S 0.0.0.0:$PORT
exec docker-php-entrypoint "$@"