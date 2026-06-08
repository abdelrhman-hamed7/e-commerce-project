<!-- قسم اللابتوبات المعتمدة -->
    <?php
// 1. بدء الجلسة في أعلى الملف لربط السلة ومنع أخطاء الـ Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. استدعاء ملف الاتصال بقاعدة البيانات
require_once "config.php";

// 3. جلب اللابتوبات والملحقات بناءً على بنية قاعدة البيانات المعتمدة
$laptops_sql = "SELECT * FROM products WHERE product_type = 'Laptop'";
$laptops_result = $conn->query($laptops_sql);

$accessories_sql = "SELECT * FROM products WHERE product_type = 'Accessory'";
$accessories_result = $conn->query($accessories_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuraTech Agency | Official Laptop & Accessories Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --main-blue: #0A2540; --accent-blue: #635BFF; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: var(--main-blue) !important; }
        .hero-section { background: linear-gradient(135deg, #0A2540 0%, #1A365D 100%); color: white; padding: 80px 0; }
        .product-card { border: none; border-radius: 12px; transition: all 0.3s ease; background: #ffffff; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08); }
        .badge-brand { background-color: var(--accent-blue); position: absolute; top: 15px; left: 15px; z-index: 10; }
        .price-tag { font-size: 1.25rem; font-weight: bold; color: #2ecc71; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">✨ AuraTech Agency</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#laptops">Authorized Laptops</a></li>
                    <li class="nav-item"><a class="nav-link" href="#accessories">Official Accessories</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light btn-sm" href="cart.php">
                            🛒 Shopping Cart 
                            <?php if(!empty($_SESSION['cart'])): ?>
                                <span class="badge bg-danger rounded-pill"><?php echo count($_SESSION['cart']); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <span class="badge bg-warning text-dark mb-3 fw-bold">Official Authorized Agency - Rwanda</span>
                    <h1 class="display-4 fw-bold mb-3">Enterprise Computing & Hardware Architecture</h1>
                    <p class="lead text-white-50">Step into the next computing generation. AuraTech provides original premium devices with certified manufacturer warranty matrices.</p>
                    <a href="#laptops" class="btn btn-warning fw-bold px-4 py-2 mt-3">Explore Certified Inventory</a>
                </div>
            </div>
        </div>
    </header>
<section id="laptops" class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0 border-start border-4 border-primary ps-3">Authorized Enterprise Laptops</h2>
            <span class="text-muted fs-6">Dynamic Catalog Integration</span>
        </div>
        <div class="row g-4">
            <?php if ($laptops_result && $laptops_result->num_rows > 0): ?>
                <?php while($row = $laptops_result->fetch_assoc()): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 product-card position-relative shadow-sm p-3">
                            <span class="badge badge-brand"><?php echo htmlspecialchars($row['brand']); ?></span>
                            <div class="card-body d-flex flex-column pt-4">
                                <h5 class="card-title fw-bold text-dark mb-2"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <p class="card-text text-muted flex-grow-1 small"><?php echo htmlspecialchars($row['description']); ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price-tag">$<?php echo number_format($row['price'], 2); ?></span>
                                    <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark px-3 rounded-pill">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12"><p class="alert alert-info">No authorized laptops registered in the repository context.</p></div>
            <?php endif; ?>
        </div>
    </section>

    <!-- قسم الملحقات الأصلية -->
    <section id="accessories" class="bg-white py-5 border-top border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0 border-start border-4 border-warning ps-3">Manufacturer Accessories</h2>
                <span class="text-muted fs-6">Certified Peripherals</span>
            </div>
            <div class="row g-4">
                <?php if ($accessories_result && $accessories_result->num_rows > 0): ?>
                    <?php while($row = $accessories_result->fetch_assoc()): ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 product-card position-relative shadow-sm p-3 border-light">
                                <span class="badge bg-secondary position-absolute" style="top:15px; left:15px;"><?php echo htmlspecialchars($row['brand']); ?></span>
                                <div class="card-body d-flex flex-column pt-4">
                                    <h5 class="card-title fw-bold text-dark mb-2"><?php echo htmlspecialchars($row['name']); ?></h5>
                                    <p class="card-text text-muted flex-grow-1 small"><?php echo htmlspecialchars($row['description']); ?></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="price-tag">$<?php echo number_format($row['price'], 2); ?></span>
                                        <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-dark px-3 rounded-pill">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12"><p class="alert alert-info">No certified accessories found in database schema.</p></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <footer class="text-center py-4 bg-dark text-white-50">
        <div class="container">
            <p class="mb-1">&copy; 2026 AuraTech Agency Rwanda | Official E-Commerce Platform Framework</p>
            <small>Designed by Reem Osama - Student Academic Submission under Git-Flow Validation</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
