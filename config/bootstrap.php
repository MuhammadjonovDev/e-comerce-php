<?php

require_once 'autoload.php';

$database = new Database('127.0.0.1','root','','ecomerce');
$pdo = $database->connect();
Product::$pdo = $pdo;

