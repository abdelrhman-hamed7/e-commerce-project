<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - AuraTech Agency</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --cyber-bg-top: #0b0f19;
            --cyber-bg-bottom: #1e1b4b;
            --neon-purple: #7c3aed;
            --neon-cyan: #06b6d4;
            --text-light: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, var(--cyber-bg-top) 0%, var(--cyber-bg-bottom) 50%, #0f172a 100%);
            color: var(--text-light);
            min-height: 100vh;
            background-attachment: fixed;
        }

        /* شريط التنقل الشفاف الموحد */
        .custom-navbar {
            background-color: transparent !important;
            padding: 25px 0;
            border-bottom: 1px solid rgba(6, 182, 212, 0.1);
        }

        .custom-navbar .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
            background: linear-gradient(90deg, #ffffff, var(--neon-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .custom-navbar .nav-link {
            color: #ffffff !important;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .custom-navbar .nav-link:hover, .custom-navbar .nav-link.active {
            color: var(--neon-cyan) !important;
            text-shadow: 0 0 10px rgba(6, 182, 212, 0.6);
        }

        /* مستطيلات زجاجية سيبرانية شبه شفافة ممتدة */
        .about-glass-rectangle {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-left: 5px solid var(--neon-purple); /* حافة بنفسجية ميتاليك للتبديل مع الأزرق */
            border-radius: 14px;
            padding: 40px;
            transition: all 0.4s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        .about-glass-rectangle.cyan-edge {
            border-left-color: var(--neon-cyan);
        }

        .about-glass-rectangle:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.04);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.15);
        }

        .badge-purple {
            background-color: rgba(124, 58, 237, 0.1);
            color: var(--neon-purple);
            border: 1px solid rgba(124, 58, 237, 0.3);
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- شريط القائمة العلوية الشفاف الموحد -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid px-5">
            <a class="navbar-brand fw-bold fs-3" href="index.php">AuraTech Agency</a>
            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto fs-5 gap-4">
                    <a class="nav-item nav-link" href="index.php">Home</a>
                    <a class="nav-item nav-link" href="products.php?category=Laptop">Authorized Laptops</a>
                    <a class="nav-item nav-link" href="products.php?category=Accessory">Official Accessories</a>
                    <a class="nav-item nav-link active" href="about.php">About Us</a>
                    <a class="nav-item nav-link" href="contact.php">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- واجهة العنوان لصفحة About -->
    <header class="container text-center" style="padding: 100px 0 50px 0;">
        <span class="badge mb-3 fw-bold px-4 py-2 rounded-pill fs-6 badge-purple">
            Our Mission & Core Core Parameters
        </span>
        <h1 class="display-3 fw-bold text-white mb-3">Architecting Technical Trust</h1>
        <p class="lead text-light opacity-75 mx-auto" style="max-width: 700px;">
            Learn how AuraTech establishes corporate-grade hardware supply chains with absolute operational transparency.
        </p>
    </header>

    <!-- محتوى صفحة التعريف على شكل مستطيلات ممتدة متناسقة مع الهوم بيج -->
    <main class="container-fluid px-5 my-4">
        
        <!-- مستطيل الرؤية والرسالة العريض -->
        <div class="row about-glass-rectangle mb-5 align-items-center mx-1">
            <div class="col-12">
                <h2 class="fw-bold mb-3" style="color: var(--neon-purple); text-shadow: 0 0 10px rgba(124, 58, 237, 0.3);">Who is AuraTech Agency?</h2>
                <p class="fs-5 text-light opacity-75 mb-0" style="line-height: 1.8;">
                    Founded to bridge the gap between high-end international hardware manufacturers and local technology demands, AuraTech operates as a premium authorized hub. We do not just sell corporate laptops and precision accessories; we deploy hardware infrastructures designed to handle dense simulation workloads, advanced software compilation, and scalable system development.
                </p>
            </div>
        </div>

        <!-- عنوان قسم مراحل فحص الأجهزة (Pipeline Metrics) -->
        <div class="row my-5 mx-1">
            <div class="col-12">
                <h3 class="fw-bold border-bottom border-secondary pb-3 text-white">Our Quality Infrastructure Matrix</h3>
            </div>
        </div>

        <!-- مستطيل القيمة الأولى -->
        <div class="row about-glass-rectangle cyan-edge mb-4 align-items-center mx-1">
            <div class="col-md-3">
                <h3 class="fw-bold mb-0" style="color: var(--neon-cyan);">01 / Firmware Verification</h3>
            </div>
            <div class="col-md-9 mt-3 mt-md-0">
                <p class="fs-5 text-light opacity-75 mb-0">
                    Every computing architecture asset entering our inventory undergoes cryptographic motherboard hash checks to guarantee original manufacturer firmware configuration without supply-chain tampering.
                </p>
            </div>
        </div>

        <!-- مستطيل القيمة الثانية -->
        <div class="row about-glass-rectangle mb-4 align-items-center mx-1">
            <div class="col-md-3">
                <h3 class="fw-bold mb-0" style="color: var(--neon-purple);">02 / Stress Testing</h3>
            </div>
            <div class="col-md-9 mt-3 mt-md-0">
                <p class="fs-5 text-light opacity-75 mb-0">
                    Laptops undergo systematic thermal and processing core threshold stress diagnostics to ensure hardware stability before final provisioning updates are applied.
                </p>
            </div>
        </div>

        <!-- مستطيل القيمة الثالثة -->
        <div class="row about-glass-rectangle cyan-edge mb-4 align-items-center mx-1">
            <div class="col-md-3">
                <h3 class="fw-bold mb-0" style="color: var(--neon-cyan);">03 / Warranty Sync</h3>
            </div>
            <div class="col-md-9 mt-3 mt-md-0">
                <p class="fs-5 text-light opacity-75 mb-0">
                    We sync purchase metadata directly with official databases, providing clients with immediate automated manufacturer warranty coverage verification.
                </p>
            </div>
        </div>

    </main>

    <!-- التذييل الموحد الفخم والموثق باسمكِ -->
    <footer class="text-center py-4 mt-5" style="background: rgba(11, 15, 25, 0.8); border-top: 1px solid rgba(6, 182, 212, 0.1);">
        <p class="mb-0 text-light opacity-50">&copy; 2026 AuraTech Agency. Designed by Reem Osama.</p>
    </footer>
   <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 