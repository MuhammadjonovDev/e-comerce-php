<?php
$title = 'Edit Product';
require 'includes/header.php';

$id = $_GET['id'];
if (!$id) {
    die("ID berilmagan.");
}

$product = Product::getById($id);
if (!$product) {
    die("Mahsulot topilmadi.");
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        Product::update(
            $id,
            $_POST['name'],
            $_POST['body'],
            $_POST['price'],
            $_FILES['image'] ?? null
        );
        header('Location: products.php');
        exit;
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<div class="min-h-screen flex items-center justify-center">
    <form method="POST" enctype="multipart/form-data"
        class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 flex flex-col gap-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Mahsulotni tahrirlash</h2>
        <?php if ($message): ?>
            <p class="px-4 py-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Rasm</label>
            <?php if ($product->image): ?>
                <img src="uploads/<?= htmlspecialchars($product->image) ?>" alt=""
                    class="w-32 h-32 object-cover rounded-lg border border-gray-200 mb-3">
            <?php endif; ?>
            <input type="file" name="image" accept="image/*"
                class="block w-full text-sm text-gray-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                          file:mr-4 file:py-2.5 file:px-4 file:border-0 file:bg-indigo-600 file:text-white
                          file:font-medium hover:file:bg-indigo-700 file:cursor-pointer">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mahsulot nomi</label>
                <input type="text" name="name" placeholder="Product name"
                    value="<?= htmlspecialchars($product->name) ?>" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none
                              focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Narxi</label>
                <input type="number" step="0.01" name="price" placeholder="Price"
                    value="<?= htmlspecialchars($product->price) ?>" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none
                              focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tavsif</label>
            <textarea name="body" rows="5" placeholder="Description"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg outline-none resize-none
                             focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"><?= htmlspecialchars($product->body) ?></textarea>
        </div>
        <button type="submit"
            class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg
                       hover:bg-indigo-700 active:scale-[0.98] transition">
            Saqlash
        </button>
    </form>
</div>

</body>

</html>