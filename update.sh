#!/bin/bash

ENV=$1

if [ "$ENV" == "staging" ]; then
    echo "Deploying DEV environment"
    php artisan down
    php artisan optimize:clear
    php artisan up
else
    echo "Deploying PROD environment"
    php artisan down
    php artisan optimize:clear
    php artisan up
fi
