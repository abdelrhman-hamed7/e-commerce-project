<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact AuraTech Agency</title>
    <!-- استدعاء البوتستراب لتفعيل التصميم المتجاوب -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- شريط التنقل (Navbar) الموحد والكامل لكل صفحات التطبيق -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php">AuraTech Agency</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="index.php">Home</a>
                    <a class="nav-item nav-link" href="products.php">Products</a>
                    <a class="nav-item nav-link" href="about.php">About Us</a>
                    <a class="nav-item nav-link active" href="contact.php">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- محتوى الصفحة القائم على المستطيلات الطويلة الممتدة بعرض الصفحة -->
    <div class="container-fluid my-5 px-4">
        
        <!-- مستطيل العنوان الرئيسي الممتد -->
        <div class="row bg-dark text-white p-5 rounded-3 mb-4 align-items-center" style="min-height: 150px;">
            <div class="col-md-12 text-center">
                <h1 class="display-5 fw-bold">Contact Our Team</h1>
                <p class="lead text-muted">We are here to assist you with your hardware and computing needs.</p>
            </div>
        </div>

        <!-- مستطيل معلومات التواصل السريع والممتد (مقسم داخلياً لأعمدة) -->
        <div class="row bg-primary text-white p-4 rounded-3 mb-4 text-center shadow-sm">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="fw-bold">📍 Location</h5>
                <p class="mb-0">Kigali, Rwanda (Near UNILAK Campus)</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="fw-bold">📞 Call / WhatsApp</h5>
                <p class="mb-0">+250 78X XXX XXX</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">✉️ Email Support</h5>
                <p class="mb-0">support@auratech.agency</p>
            </div>
        </div>

        <!-- مستطيل نموذج التواصل العريض والممتد -->
        <div class="row bg-white border p-5 rounded-3 shadow-sm">
            <div class="col-md-12">
                <h3 class="fw-bold mb-4 text-dark">Send Us a Message</h3>
                
                <form action="process_contact.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-lg bg-light" placeholder="Enter your full name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-lg bg-light" placeholder="name@example.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message Subject</label>
                        <input type="text" name="subject" class="form-control form-control-lg bg-light" placeholder="What can we help you with?" required>
                        </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Your Message</label>
                        <textarea name="message" class="form-control form-control-lg bg-light" rows="5" placeholder="Type your detailed message here..." required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg px-5">Send Message</button>
                </form>
            </div>
        </div>

    </div>

    <!-- تذييل الصفحة الاحترافي والموثق باسمكِ الشخصي -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; 2026 AuraTech Agency. Designed by Reem Osama.</p>
    </footer>

    <!-- ملفات الجافاسكريبت المساعدة للبوتستراب لتشغيل القائمة -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>