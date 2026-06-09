<?php
// إعدادات الاتصال بقاعدة البيانات لبيئة حاويات الدوكر مع تحديد المنفذ المعدل
$db_host = 'db'; // اسم حاوية قاعدة البيانات في Docker
$db_user = 'root';
$db_pass = 'root_password';
$db_name = 'laptop_agency_db';
$db_port = 3306; // المنفذ الداخلي الثابت للحاوية

// إنشاء الاتصال مع تمرير المنفذ لضمان الربط الصحيح
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("Critical Error: Database Connection Failed -> " . $conn->connect_error);
}

// توحيد ترميز البيانات
$conn->set_charset("utf8mb4");
?>