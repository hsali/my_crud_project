#!/bin/bash


# Perform a git pull to fetch the latest changes
git pull origin main

# Install/update dependencies
composer install --no-interaction --no-dev --prefer-dist

npm install 

# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:cache

# Clear route cache
php artisan route:cache

# Clear view cache
php artisan view:cache

# Run database migrations
php artisan migrate 

echo "completed pulling"
echo "datetime: $(date +%Y-%m-%d:%H:%M:%S)" >> deploy.log