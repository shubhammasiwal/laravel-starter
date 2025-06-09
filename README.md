# Laravel LGD Seeder Project

This project is a Laravel-based application that includes seeders for LGD (Local Government Directory) States and Districts, using Excel files as data sources.

## Features

- **Seed LGD States and Districts** from `.xlsx` files using [maatwebsite/excel](https://laravel-excel.com/).
- Uses [spatie/laravel-permission](https://spatie.be/docs/laravel-permission) for roles and permissions.
- Livewire components for dynamic UI.
- Organized storage for sensitive files.

## Requirements

- PHP 8.2+
- Laravel 12+
- [maatwebsite/excel](https://laravel-excel.com/) (`composer require maatwebsite/excel`)
- [spatie/laravel-permission](https://spatie.be/docs/laravel-permission)
- Excel files for states and districts in `storage/app/private/`

## Setup

1. **Clone the repository and install dependencies:**
    ```sh
    git clone git@github.com:shubhammasiwal/laravel-starter.git 
    cd laravel-starter
    composer install
    ```

2. **Copy your `.env` file and set up your database:**
    ```sh
    cp .env.example .env
    php artisan key:generate
    # Edit .env to set DB credentials
    ```

3. **Run migrations:**
    ```sh
    php artisan migrate
    ```

4. **Place your Excel files:**
    - `lgd_states.xlsx` and `lgd_districts.xlsx` should be placed in `storage/app/private/`.

5. **Seed the database:**
    ```sh
    php artisan db:seed
    ```

## Notes

- Make sure the `zip` PHP extension is enabled for Excel import.
- Excel files should have the correct columns as expected by the seeders.
- For roles/permissions, see the `PermissionSeeder` and related Livewire components.

