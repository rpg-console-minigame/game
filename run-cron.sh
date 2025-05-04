#!/bin/bash
# Make sure this file has executable permissions, run `chmod +x run-cron.sh`

# This block of code runs the Laravel scheduler every minute
while [ true ]
    do
        php artisan schedule:run
        sleep 60
    done