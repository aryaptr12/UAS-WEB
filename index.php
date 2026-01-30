<?php
include 'functions.php';
$products = getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>E-Commerce Sederhana</h1>
        <a href="cart.php">Keranjang (<?php echo count(getCart()); ?>)</a>
    </header>
    <main>
        <h2>Daftar Produk</h2>
        <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                    <div class="quantity-controls">
                        <button class="qty-btn" onclick="changeQuantity(<?php echo $product['id']; ?>, -1)">-</button>
                        <input type="number" id="qty-<?php echo $product['id']; ?>" value="1" min="1" readonly>
                        <button class="qty-btn" onclick="changeQuantity(<?php echo $product['id']; ?>, 1)">+</button>
                    </div>
                    <button class="add-btn" onclick="addToCart(<?php echo $product['id']; ?>)">Tambah ke Keranjang</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>