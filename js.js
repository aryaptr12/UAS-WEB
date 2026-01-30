function changeQuantity(productId, delta) {
    const qtyInput = document.getElementById('qty-' + productId);
    let currentQty = parseInt(qtyInput.value);
    currentQty += delta;
    if (currentQty < 1) currentQty = 1;
    qtyInput.value = currentQty;
}

function addToCart(productId) {
    const qtyInput = document.getElementById('qty-' + productId);
    const quantity = parseInt(qtyInput.value);
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + productId + '&quantity=' + quantity
    })
    .then(response => response.text())
    .then(data => {
        alert('Produk ditambahkan ke keranjang!');
        // Reset quantity ke 1 setelah tambah
        qtyInput.value = 1;
        // Update jumlah keranjang di header jika diperlukan (opsional)
    });
}