# PHP Blog Website

A simple blog website built with PHP and MySQL. The project allows users to browse blog posts, read articles, and manage blog content.

## Features

- Display blog posts
- View individual blog articles
- About page
- Pricing page
- Create new posts
- Edit existing posts
- Responsive user interface
- MySQL database integration

## Technologies Used

- PHP
- MySQL
- PDO
- HTML5
- CSS3

## Project Structure

```text
projectPHP/
├── assets/
│   └── style.css
├── includes/
│   ├── footer.php
│   ├── header.php
│   └── navbar.php
├── src/
│   └── images/
├── about.php
├── blog.php
├── createPost.php
├── index.php
├── post-edit.php
├── post.php
└── prices.php
```

## Installation

1. Clone the repository:

```bash
git clone https://github.com/MuhammadjonovDev/blog-php.git
```

2. Move into the project directory:

```bash
cd blog-php
```

3. Create a MySQL database named `php-blog`.

4. Configure your database connection in `database.php`:

```php
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "php-blog";
```

5. Start your local PHP server:

```bash
php -S localhost:8000
```

6. Open your browser:

```text
http://localhost:8000
```

## Author

**MuhammadjonovDev**

GitHub: https://github.com/MuhammadjonovDev