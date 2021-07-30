#!/bin/bash
composer install
php artisan key:generate
cp .env.example .env
echo "App is installed"
