<?php
// Data produk Cia Store (Minimal 6 produk)
$products = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Display",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 150000,
        "stok" => 10
    ],
    [
        "nama" => "Mechanical Keyboard",
        "kategori" => "Aksesoris",
        "harga" => 750000,
        "stok" => 0 
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Computer",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 450000,
        "stok" => 5
    ],
    [
        "nama" => "USB-C Hub Multiport",
        "kategori" => "Aksesoris",
        "harga" => 250000,
        "stok" => 2
    ]
];

// Requirement 11: Menghitung total produk secara otomatis
$total_produk = count($products); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Requirement 12: Navbar/Header -->
    <header class="navbar">
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#home">Home</a>
            <a href="#products">Products</a>
            <a href="#about">About</a>
        </nav>
    </header>

    <main class="container">
        <!-- Requirement 12: Hero / Bagian Pembuka -->
        <section id="home" class="hero">
            <div class="hero-content">
                <span class="sub-brand">CIA STORE</span>
                <h1>Simple Tech Store.</h1>
                <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
                <a href="#products" class="btn-hero">Lihat Produk</a>
            </div>
        </section>

        <!-- Requirement 12: Informasi Jumlah Produk & Katalog Produk -->
        <section id="products" class="catalog-section">
            <div class="catalog-header">
                <div>
                    <span class="section-subtitle">OUR PRODUCTS</span>
                    <h2>Katalog Produk</h2>
                </div>
                <!-- Requirement 11: Total produk otomatis -->
                <div class="total-badge">
                    Total Produk: <strong><?= $total_produk; ?></strong>
                </div>
            </div>

            <!-- Requirement 13: Grid susunan card produk -->
            <div class="product-grid">
                <?php foreach ($products as $item): ?>
                    <?php 
                        // Requirement 10: Format Rupiah
                        $harga_formatted = "Rp" . number_format($item['harga'], 0, ',', '.');
                        
                        // Challenge: Diskon 10% jika harga >= Rp1.000.000
                        $has_discount = $item['harga'] >= 1000000;
                        if ($has_discount) {
                            $harga_diskon = $item['harga'] * 0.9;
                            $harga_diskon_formatted = "Rp" . number_format($harga_diskon, 0, ',', '.');
                        }
                    ?>

                    <div class="product-card">
                        <!-- Challenge: Display Discount Badge -->
                        <?php if ($has_discount): ?>
                            <span class="discount-badge">DISKON 10%</span>
                        <?php endif; ?>

                        <p class="category"><?= htmlspecialchars($item['kategori']); ?></p>
                        <h3><?= htmlspecialchars($item['nama']); ?></h3>
                        
                        <!-- Format Harga Normal vs Harga Diskon -->
                        <div class="price-container">
                            <?php if ($has_discount): ?>
                                <p class="old-price"><del><?= $harga_formatted; ?></del></p>
                                <p class="final-price"><?= $harga_diskon_formatted; ?></p>
                            <?php else: ?>
                                <p class="final-price"><?= $harga_formatted; ?></p>
                            <?php endif; ?>
                        </div>

                        <p class="stock">Stok: <?= $item['stok']; ?></p>

                        <!-- Requirement 7, 8, 9: Status Stok & Tombol Beli -->
                        <div class="card-footer">
                            <?php if ($item['stok'] > 0): ?>
                                <span class="status available">Tersedia</span>
                                <button class="buy-button">Beli Sekarang</button>
                            <?php else: ?>
                                <span class="status out-of-stock">Stok Habis</span>
                                <button class="buy-button disabled" disabled>Beli Sekarang</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <!-- Requirement 12: Footer -->
    <footer>
        <p>&copy; <?= date('Y'); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>