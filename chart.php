<?php
include 'functions.php';
$cart = getCart();
$total = getTotal();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove'])) {
        removeFromCart($_POST['product_id']);
        header('Location: chart.php');
    } elseif (isset($_POST['update'])) {
        updateCart($_POST['product_id'], $_POST['quantity']);
        header('Location: chart.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Keranjang Belanja</h1>
        <a href="index.php">Kembali ke Produk</a>
    </header>
    <main>
        <?php if (empty($cart)): ?>
            <p>Keranjang kosong.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td><?php echo $item['product']['name']; ?></td>
                            <td>Rp <?php echo number_format($item['product']['price'], 0, ',', '.'); ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $item['product']['id']; ?>">
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                    <button type="submit" name="update">Update</button>
                                </form>
                            </td>
                            <td>Rp <?php echo number_format($item['product']['price'] * $item['quantity'], 0, ',', '.'); ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $item['product']['id']; ?>">
                                    <button type="submit" name="remove">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total: Rp <?php echo number_format($total, 0, ',', '.'); ?></p>
            <a href="CO.php">Checkout</a>
        <?php endif; ?>
    </main>
</body>
</html>