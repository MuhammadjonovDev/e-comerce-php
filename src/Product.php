<?php

class Product
{
    public static $pdo;
    public $id;
    public $name;
    public $body;
    public $image;
    public $price;

    public static function getAll()
    {
        $stmt = self::$pdo->prepare('SELECT * FROM products ');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        $stmt->execute();
        $products = $stmt->fetchAll();

        return $products;
    }

    public static function getById($id)
    {
        $stmt = self::$pdo->prepare('SELECT * FROM products  WHERE id = ?');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        $stmt->execute([$id]);
        $product = $stmt->fetch();

        return $product;
    }

    public static function create($name, $body, $price, $file)
    {
        $imageName = null;

        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                throw new Exception("Faqat jpg, png, webp, gif ruxsat etiladi.");
            }

            $dir = __DIR__ . '/../uploads/';
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $imageName = time() . "_" . uniqid() . "." . $ext;
            move_uploaded_file($file['tmp_name'], $dir . $imageName);
        }

        $stmt = self::$pdo->prepare("INSERT INTO products (name, body, price, image) VALUES (:name, :body, :price, :image)");
        $stmt->execute([
            'name' => $name,
            'body' => $body,
            'price' => $price,
            'image' => $imageName
        ]);
        $row = $stmt->rowCount();
        return $row;
    }

    public static function update($id, $name, $body, $price, $file)
    {
        $old = self::getById($id);
        if (!$old) {
            throw new Exception("Mahsulot topilmadi.");
        }

        $imageName = $old->image; // standart: eski rasm qoladi

        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                throw new Exception("Faqat jpg, png, webp, gif ruxsat etiladi.");
            }

            $dir = __DIR__ . '/../uploads/';
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $imageName = time() . "_" . uniqid() . "." . $ext;
            move_uploaded_file($file['tmp_name'], $dir . $imageName);

            // eski rasmni papkadan o'chirish
            if ($old->image && file_exists($dir . $old->image)) {
                unlink($dir . $old->image);
            }
        }

        $stmt = self::$pdo->prepare(
            "UPDATE products SET name = :name, body = :body, price = :price, image = :image WHERE id = :id"
        );
        $stmt->execute([
            'name'  => $name,
            'body'  => $body,
            'price' => $price,
            'image' => $imageName,
            'id'    => $id,
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id)
    {
        $product = self::getById($id);
        if (!$product) {
            return 0;
        }

        $stmt = self::$pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);

        if ($product->image) {
            $path = __DIR__ . '/../uploads/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        return $stmt->rowCount();
    }

    public static function search($search = '')
    {
        if ($search === '') {
            return self::getAll();
        }

        $stmt = self::$pdo->prepare(
            "SELECT * FROM products WHERE name LIKE :s1 OR body LIKE :s2 ORDER BY id DESC"
        );
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        $stmt->execute([
            's1' => "%$search%",
            's2' => "%$search%",
        ]);
        return $stmt->fetchAll();
    }
}
