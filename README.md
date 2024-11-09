
MyShop Ro E-Commerce Project:

Project Description

This is a simple e-commerce application built with Laravel 10 and PHP 8.2. The application includes an admin dashboard that allows managing various platform aspects, such as products, categories, users, and orders. Additionally, it has a main page for browsing products, enabling users to explore available items.

Key Features

Admin Dashboard:

Tables for managing Categories, Products, Users, and Orders.
CRUD operations (Create, Read, Update, Delete) for all resources.


User Interface:
A main page to browse and view products.


Authentication and Security:
User authentication using Laravel UI and secure API access with Sanctum.
Admin Account:

Email: admin@admin.com
Password: 12345678

Requirements
PHP 8.2
Laravel 10
MySQL Database
Composer
Node.js and NPM


Installation
1. Clone the repository:
git clone 


2. Install dependencies:

composer install
npm install
npm run dev


3. Set up the environment file:

Copy the .env.example file and rename it to .env:
cp .env.example .env

Update the database settings in the .env file:

DB_DATABASE=myshopro_db


4. Generate the application key:
php artisan key:generate


5. Run migrations and seed the database:
php artisan migrate --seed


6. Run the server:
php artisan serve



Project Structure

app/Http/Controllers/Admin: Contains controllers for managing resources like categories, products, users, and orders.

resources/views: Holds the Blade templates for the user interface, including the main product browsing page and the admin dashboard.

routes: Contains routing files for the web (web.php) and API (api.php) routes.


API Endpoints:
The API is secured with Sanctum, allowing for authenticated user access. API endpoints can be found in routes/api.php.



Authentication:
POST /api/register
POST /api/login
POST /logout

Products:
GET /api/products
GET /api/products/{id}
GET /api/products/search/{name}
GET /api/products/filter/{category}

Order(must login user):
GET /api/user/orders
POST /api//user/addorder
POST /api/user/canncelorder/{id}

Show All Orders(for Admin Just)
GET /api/admin/allOrders


Authentication

API authentication is handled by Laravel Sanctum. For protected requests, make sure to include the authentication token in the request headers.

Admin Access
Use the following credentials to log in as the admin:

Email: admin@admin.com
Password: 12345678

Exaple Customer acount:
Email: admin@admin.com
Password: 12345678

