<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// تدمير ومسح كافة بيانات الجلسة الحالية لتأمين النظام
$_SESSION = array();
session_destroy();

// إعادة التوجيه لصفحة دخول الإدارة
header("Location: admin-login.php");
exit();
?>