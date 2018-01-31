This is the Laravel platform for the API and interface for users to search, share and create configurations.

If any of the dependencies are causing issues, for doing local development I'd recommend using a Laravel Homestead virtual machine, instructions here: https://laravel.com/docs/5.5/homestead.

When you clone the project, you may have to set the environment and application key. This can be done by `mv .env.example .env`, followed by `php artisan key:generate`.

If any of the migration files have changed, you may have to run `php artisan migrate:refresh --seed` to drop the tables, roll back any migrations, run the updated migrations and re-seed.

Then simply run `php artisan serve` to start a development server.


