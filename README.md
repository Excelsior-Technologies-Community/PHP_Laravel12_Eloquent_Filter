# PHP_Laravel12_Eloquent_Filter
## Project Overview

This project is a complete Product Management System built using Laravel 12 and the Eloquent Filter package.
It demonstrates advanced filtering, searching, and full CRUD operations for products with a clean and responsive Bootstrap interface.

The system allows users to search, filter, create, update, delete, and view products with multiple filter parameters such as price range, stock range, category, brand, and status.

This project is ideal for learning **Dynamic Query Filtering, CRUD Operations, Factories, Seeders, and Pagination** in Laravel.

---

## Features

* Complete Product CRUD
* Advanced Eloquent Filter integration
* Search by name, description, and brand
* Filter by category and brand
* Price range filtering
* Stock range filtering
* Active and inactive status filter
* Bootstrap 5 responsive UI
* Pagination with query string preservation
* Form validation
* Flash success messages

---

## Technology Stack

* PHP 8+
* Laravel 12
* MySQL
* Bootstrap 5
* Eloquent Filter Package
* Blade Templates

---

## Installation Steps

### Step 1: Install Laravel

```
composer create-project laravel/laravel laravel-filter-project
cd laravel-filter-project
```

### Step 2: Install Eloquent Filter Package

```
composer require tucker-eric/eloquent-filter
```

### Step 3: Database Configuration

Create database named `laravel_filter` and update `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_filter
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Create Products Migration

```
php artisan make:migration create_products_table
```

Fields:

* id
* name
* description
* price
* stock
* category
* brand
* is_active
* timestamps

Run migration:

```
php artisan migrate
```

---

## Core Components

### Product Model

* Uses `Filterable` trait
* Fillable attributes
* Casts for price and status
* Model filter binding

### Product Filter

Handles dynamic query filtering:

* Name filter
* Price min and max
* Category filter
* Brand filter
* Stock min and max
* Active status filter
* Global search filter

---

## Factories and Seeders

### Factory

Generates random products using Faker:

* Random categories
* Random brands
* Random price and stock

### Seeder

Creates 50 demo products.

```
php artisan db:seed
```

---

## Controller Functions

* index – list products with filters
* create – show add form
* store – save product
* show – product details
* edit – edit form
* update – update product
* destroy – delete product

---

## Routes

Route::get('/', redirect to products)

<img width="1613" height="969" alt="image" src="https://github.com/user-attachments/assets/fc337102-d00e-4e5a-b375-b80ad40bd0ed" />

Route::resource('products', ProductController::class)

<img width="1676" height="846" alt="image" src="https://github.com/user-attachments/assets/8a9fbb0c-7b77-4fc0-a983-13ab99899f31" />

```

---

## Blade Views

Directory Structure:

```
resources/views/
  layouts/app.blade.php
  products/index.blade.php
  products/create.blade.php
  products/edit.blade.php
  products/show.blade.php
```

UI Includes:

* Navbar
* Filter Form
* Product Table
* Pagination
* Add and Edit Forms
* Product Detail Page

---

## Running the Application

```
php artisan serve
```

Open in browser:

```
http://localhost:8000
```

---

## How Filtering Works

1. User selects filter parameters
2. Request sends query values
3. Product model applies `ProductFilter`
4. Filter class builds dynamic SQL queries
5. Results returned with pagination

---

## Filter Types Supported

* Text Search
* Category Dropdown
* Brand Dropdown
* Price Minimum and Maximum
* Stock Minimum and Maximum
* Active or Inactive Status

---

## Use Cases

* E‑commerce dashboards
* Admin panels
* Inventory systems
* Reporting tools
* Learning dynamic filtering

---

## Optional Enhancements

* API version of filters
* Export to CSV or Excel
* Multi‑select category filters
* Image upload for products
* Role‑based permissions

---

## Requirements

* PHP 8 or higher
* Composer
* MySQL
* Internet connection

---

## Author

Mihir Mehta

---

## License

Open Source

