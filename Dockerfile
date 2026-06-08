# استخدام نسخة PHP الرسمية المدمجة مع سيرفر Apache
FROM php:8.2-apache

# تثبيت وتفعيل إضافة mysqli للاتصال بقاعدة البيانات بنجاح
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# تفعيل مود الـ Rewrite الخاص بـ Apache للمشاريع الاحترافية
RUN a2enmod rewrite

# تحديد مسح العمل الافتراضي داخل الحاوية
WORKDIR /var/www/html/