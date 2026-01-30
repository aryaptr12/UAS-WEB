<?php
// Fungsi untuk mendapatkan daftar produk
function getProducts() {
    return [
        ['id' => 1, 'name' => 'Rujak Buah', 'price' => 10000, 'image' => 'image/2.jpg'],
        ['id' => 2, 'name' => 'Bakso', 'price' => 20000, 'image' => 'image/3.jpg'],
        ['id' => 3, 'name' => 'Ramen Katsu', 'price' => 30000, 'image' => 'image/4.jpg'],
        ['id' => 4, 'name' => 'Mie Ayam', 'price' => 15000, 'image' => 'image/1.jpg'],
    ];
}

// Fungsi untuk menambah produk ke keranjang (session)
function addToCart($productId, $quantity = 1) {
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Fungsi untuk mendapatkan keranjang
function getCart() {
    session_start();
    $products = getProducts();
    $cart = [];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qty) {
            foreach ($products as $product) {
                if ($product['id'] == $id) {
                    $cart[] = ['product' => $product, 'quantity' => $qty];
                    break;
                }
            }
        }
    }
    return $cart;
}

// Fungsi untuk menghapus item dari keranjang
function removeFromCart($productId) {
    session_start();
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

// Fungsi untuk update quantity
function updateCart($productId, $quantity) {
    session_start();
    if ($quantity <= 0) {
        removeFromCart($productId);
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Fungsi untuk menghitung total
function getTotal() {
    $cart = getCart();
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['product']['price'] * $item['quantity'];
    }
    return $total;
}
?>