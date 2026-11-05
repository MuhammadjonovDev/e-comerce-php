<?php
$title = 'Add Product';
require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = Product::create(
        $_POST['name'],
        $_POST['body'],
        $_POST['price'],
        $_FILES['image']
    );


    if ($result == 1) {
        header('Location: products.php');
        exit;
    }
}

?>

<div class="min-h-screen flex items-center justify-center">
    <form method="POST" action="" enctype="multipart/form-data"
        class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 flex flex-col gap-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center">mahsulot qo'shish</h2>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Rasm</label>
            <input type="file" name="image" accept="image/*"
                class="block w-full text-sm text-gray-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                          file:mr-4 file:py-2.5 file:px-4 file:border-0 file:bg-indigo-600 file:text-white
                          file:font-medium hover:file:bg-indigo-700 file:cursor-pointer">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mahsulot nomi</label>
                <input type="text" name="name" placeholder="Product name"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none
                              focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Narxi</label>
                <input type="number" name="price" placeholder="Price"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none
                              focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tavsif</label>
            <textarea name="body" rows="5" placeholder="Description"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none resize-none
                             focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"></textarea>
        </div>
        <button type="submit"
            class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg
                       hover:bg-indigo-700 active:scale-[0.98] transition">
            Yuborish
        </button>
    </form>
</div>

</body>

</html>