# Sample streaming plaftorm 

- Clone this project in your /var/www directory
- cd accedo and run composer install
- cd public and run bower install

=====
- cd accedo
- Change .env.example to .env
- Update the credentials based on your server setup and database setup

=====
- Create database name accedo in your mysql server
- In your accedo directory, run php artisan migrate once done run php artisan db:seed
- Done

=====
- Users credentials can be found here: database/seeds/UsersTableSeeder.php
