#!/bin/bash
composer install
php artisan key:generate
cp -r .env.example .env
echo "App is installed"
