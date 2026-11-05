<?php
session_start();

require_once 'config/bootstrap.php';

$search = trim($_GET['search'] ?? '');
$products = Product::search($search);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?? "E-comerce" ?> </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <nav class="my-8 p-4 flex justify-between items-center border">

        <ul class="flex justify-center items-center">
            <li class="mr-6">
                <a class="text-black-500 hover:text-black-800" href="/">Home</a>
            </li>
            <li class="mr-6">
                <a class="text-black-500 hover:text-black-800" href="/products.php">Products</a>
            </li>
            <li class="mr-6">
                <a class="text-black-500 hover:text-black-800" href="/addProduct.php">Add Product</a>
            </li>
        </ul>
        <div>
            <form method="GET" class="flex gap-3">
                <input type="text" name="search" placeholder="Mahsulot qidirish..." class="border w-100 rounded p-2"
                    value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Qidirish</button>
                <a href="index.php" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Tozalash</a>
            </form>

            <?php if (!$products): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p class="font-bold">Hech narsa topilmadi</p>
                    </div>
                <?php endif; ?>
        </div>
    </nav>