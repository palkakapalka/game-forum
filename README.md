ENG
Website made for an exam in the course "timekļa tehnoloģijas 2",PHP and Laravel were used.

LV
Vietne, kas izveidota eksāmenam kursā "timekļa tehnoloģijas 2",tika izmantoti PHP un Laravel.

RU
сайт сделанный для эезамена по курсу "timekļa tehnoloģijas 2",был использован PHP и Laravel.

Use this script to create database

        CREATE USER 'gaming_forum'@'%' IDENTIFIED by 'gaming_forum';
        GRANT USAGE ON *.* TO 'gaming_forum'@'%';
        CREATE DATABASE IF NOT EXISTS `gaming_forum`;
        GRANT ALL PRIVILEGES ON `gaming_forum`.* TO 'gaming_forum'@'%';
        
        CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM('user', 'creator', 'admin') DEFAULT 'user',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        
        CREATE TABLE posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            body TEXT NOT NULL,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );
        
        CREATE TABLE post_images (
            id INT AUTO_INCREMENT PRIMARY KEY,
            post_id INT NOT NULL,
            image_url VARCHAR(255) NOT NULL,
            FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
        );
        
        CREATE TABLE comments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            post_id INT NOT NULL,
            user_id INT NOT NULL,
            body TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );


