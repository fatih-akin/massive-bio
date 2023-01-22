# NEW
# About Case Study

This project was developed by Fatih AKIN


# Installation

## 1. Copy environment file

    cp .env.example .env

## 2. Install required packages by using docker

    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

## 3. Stand up project with docker

    ./vendor/bin/sail up
or

    ./vendor/bin/sail up -d

## 4. Run migration

    docker exec -it <app-container-name> php artisan migrate
like

    docker exec -it massive-bio-laravel.test-1 php artisan migrate


# Notes
You can see database ER diagram which name is "er-diagram.png", in root directory 
