# E-Commerce Product Management (PHP)

A lightweight product management web application built with PHP and MySQL. It supports listing, searching, adding, editing, and deleting products, including product image uploads.

## Features

- Public landing page (`index.php`) showing the latest products from the database
- Display all products
- Search products by name or description
- Add a product with name, description, price, and image
- Edit product details and replace its image
- Delete products and their associated uploaded images
- MySQL database access through PDO

## Tech stack

- PHP
- MySQL
- PDO
- HTML
- Tailwind CSS (loaded through the browser CDN)

## Project structure

```text
e-comerce-php/
├── config/
│   ├── autoload.php
│   └── bootstrap.php
├── includes/
│   └── header.php
├── src/
│   ├── Database.php
│   └── Product.php
├── uploads/             # Product images
├── addProduct.php
├── editProduct.php
├── index.php            # Public landing page (home)
├── products.php         # Admin product list (edit/delete)
├── .gitignore
└── README.md
```

## Requirements

- PHP 8.0 or later
- MySQL 5.7+ or a compatible MariaDB version
- PHP PDO MySQL extension (`pdo_mysql`)
- A web server or PHP built-in development server

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/MuhammadjonovDev/e-comerce-php.git
cd e-comerce-php
```

### 2. Create the database

Create a MySQL database named `ecomerce`:

```sql
CREATE DATABASE ecomerce
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ecomerce;

CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    body TEXT,
    price DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. Configure the database connection

The current connection settings are in `config/bootstrap.php`:

```php
$database = new Database('127.0.0.1', 'root', '', 'ecomerce');
```

Change the host, MySQL username, password, and database name to match your local environment. Do not commit real production credentials to GitHub. For a deployed environment, load credentials from environment variables or a local configuration file excluded by `.gitignore`.

### 4. Make sure uploads is writable

The application saves uploaded product images in the `uploads/` directory. Ensure the PHP process has permission to write to this directory.

### 5. Start the development server

Run this command from the project root:

```bash
php -S localhost:8000
```

Open the application:

```text
http://localhost:8000              # landing page
http://localhost:8000/products.php  # product management (edit/delete)
```

Shop name, phone, Telegram link, address and opening hours for the landing page are set at the top of `index.php`.

## Notes

- The application expects the MySQL table to be named `products` with the columns shown in the SQL setup above.
- Product images are stored as files in `uploads/`; the database stores each image filename.
- The Tailwind browser CDN is convenient for development. For production, consider compiling Tailwind CSS into static assets.
- Use this project as a learning/demo application. Add authentication, CSRF protection, server-side validation, and stricter upload validation before deploying it publicly.

## Author

**MuhammadjonovDev**

GitHub: https://github.com/MuhammadjonovDev
