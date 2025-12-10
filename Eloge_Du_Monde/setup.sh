#!/bin/bash

php spark migrate:rollback --all
php spark migrate
php spark db:seed UserSeeder
php spark db:seed CountrySeeder
php spark db:seed BlogPostSeeder
php spark db:seed ReviewSeeder
php spark db:seed TripStepSeeder
php spark serve
xdg-open http://localhost:8080 &