<?php
include 'functions.php';
$cart = getCart();
$total = getTotal();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simulasi pembayaran berhasil
    session_start();
    unset($_SESSION['cart']);
    echo "<p>Pembayaran berhasil! Terima kasih.</p>";
    echo "<a href='index.php'>Kembali ke Produk</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Checkout</h1>
        <a href="cart.php">Kembali ke Keranjang</a>
    </header>
    <main>
        <h2>Ringkasan Pesanan</h2>
        <ul>
            <?php foreach ($cart as $item): ?>
                <li><?php echo $item['product']['name']; ?> x <?php echo $item['quantity']; ?> - Rp <?php echo number_format($item['product']['price'] * $item['quantity'], 0, ',', '.'); ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Total: Rp <?php echo number_format($total, 0, ',', '.'); ?></p>
        <form method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="address">Alamat:</label>
            <textarea id="address" name="address" required></textarea><br>
            <button type="submit">Bayar</button>
        </form>
    </main>
</body>
</html>