CREATE DATABASE IF NOT EXISTS laptop_agency_db;
USE laptop_agency_db;

-- 1. جدول المستخدمين / المدراء لـ AuraTech
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'admin'
);

-- 2. جدول المنتجات والملحقات المتكامل
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(100) NOT NULL,
    product_type ENUM('Laptop', 'Accessory') NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT DEFAULT 10,
    image_url VARCHAR(255) DEFAULT 'default.jpg'
);

-- 3. جدول العملاء والطلبات (Checkout)
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(50) NOT NULL,
    delivery_address TEXT NOT NULL,
    payment_method VARCHAR(50) DEFAULT 'Mobile Money',
    total_amount DECIMAL(10, 2) NOT NULL,
    order_status ENUM('Pending', 'Paid', 'Shipped', 'Completed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. تفاصيل المنتجات داخل كل طلب
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- إضافة البيانات التجريبية للمتجر
INSERT INTO products (name, brand, product_type, description, price, stock_quantity) VALUES
('HP ProBook 450 G10', 'HP', 'Laptop', 'Intel Core i7, 16GB RAM, 512GB SSD. Official 1-year warranty.', 850.00, 15),
('Dell XPS 15 Ultra', 'Dell', 'Laptop', 'Intel Core i9, 32GB RAM, 1TB SSD, NVIDIA RTX 4050.', 1899.00, 5),
('MacBook Air M3', 'Apple', 'Laptop', 'Apple M3 chip, 8GB Unified Memory, 256GB SSD storage.', 1099.00, 8),
('Logitech MX Master 3S', 'Logitech', 'Accessory', 'Performance wireless mouse, ergonomic silent design.', 99.00, 30),
('Dell EcoLoop Pro Backpack', 'Dell', 'Accessory', 'Protective weather-resistant laptop backpack up to 16".', 45.00, 25),
('HP USB-C G5 Essential Dock', 'HP', 'Accessory', 'Universal docking station with power delivery.', 150.00, 12);