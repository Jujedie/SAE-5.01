@echo off

php spark migrate:rollback --all
php spark migrate
php spark db:seed UserSeeder
php spark db:seed CountrySeeder
php spark db:seed BlogPostSeeder
php spark db:seed ReviewSeeder
php spark db:seed TripStepSeeder
start php spark serve
start http://localhost:8080