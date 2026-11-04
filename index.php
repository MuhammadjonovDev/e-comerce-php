<?php
$title = "landing page";
require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    Product::delete($_POST['product_id']);
    header('Location: index.php');
    exit;
}
?>


<?php if (!$products): ?>
    <p>Hech narsa topilmadi.</p>
<?php endif; ?>

<div class="grid grid-cols-5 grid-rows-5 gap-4">
    <?php foreach ($products as $product): ?>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full h-64 object-contain" src="uploads/<?= ($product->image) ?>" alt="<?= ($product->name) ?>">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><?= ($product->name) ?></div>
                <p class="text-gray-700 text-base">
                    <?= ($product->body) ?>
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= htmlspecialchars($product->price) ?> so'm</span>

                <div>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><a href="/editProduct.php?id=<?= $product->id ?>">Edit</a></span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        <form method="POST" onsubmit="return confirm('Rostan ham o\'chirasizmi')">
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <input type="hidden" name="DELTE">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                        </form>
                    </span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


</body>

</html>