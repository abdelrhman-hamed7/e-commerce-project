
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    category VARCHAR(100) 
);


INSERT INTO products (name, description, price, image_url, category) VALUES
('HP Pavilion 15', 'Intel Core i7, 16GB RAM, 512GB SSD. Perfect for students and professionals.', 750.00, 'hp_pavilion.jpg', 'HP'),
('Dell XPS 13', 'Intel Core i5, 8GB RAM, 256GB SSD. Ultra-thin premium laptop with InfinityEdge display.', 999.00, 'dell_xps.jpg', 'Dell'),
('Lenovo ThinkPad E14', 'AMD Ryzen 5, 16GB RAM, 512GB SSD. High durability business laptop.', 680.00, 'lenovo_thinkpad.jpg', 'Lenovo');
