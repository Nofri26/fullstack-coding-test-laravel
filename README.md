## About the Application

This application is built using Laravel. The structure follows Laravel general structure (MVC), with an additional pattern for controllers, such as using Requests for form validation. The RESTfull API is implemented using Sanctum. I did not encounter any difficulties during development, but I faced challenges during deployment since I have never deployed a project professionally—only as personal projects.
The versions used in this project are as follows:

- **Laravel**: version `11.38.2`

## Specification

The following are the specifications required to run this application:

- **Composer**: version `2.7.9`
- **PHP**: version `8.2`
- **Node.js**: version `v22.12.0`
- **NPM**: version `10.9.0`

Ensure all dependencies are installed according to the specifications above before proceeding with the installation.

## Installation

Follow these steps to install and run the application:

1. **Clone repository**  
   Make sure you have cloned this repository into your local folder using:
   ```bash
   git https://github.com/Nofri26/fullstack-coding-test-laravel.git
   cd fullstack-coding-test-laravel
   ```
2. **Install PHP dependencies**  
   Run the following command to install all required PHP dependencies::
   ```bash
    composer install
   ```
3. **Install JavaScript dependencies**  
   Run the following command to install all required Node.js dependencies:
   ```bash
    npm install
   ```
4. **Setup database**  
   The application supports SQLite (tested) or MySQL:
   ```bash
   cp .env.example .env
   ```
5. **Run Migrations and Seeders**  
   Execute migrations to create database tables:
   ```bash
   php artisan migrate --seed
    ```
6. **Run the application**  
   Use the following command to start the local server:
   ```bash
   composer run dev
    ```

Access the application in your browser at http://127.0.0.1:8000/
Or Live access at https://fullstack-coding-test-laravel-uova-hyvjh5ad9-nofri26s-projects.vercel.app/
