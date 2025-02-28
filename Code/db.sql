--Create database
CREATE DATABASE dental_care;

-- Use the database
USE dental_care;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Create appointments table
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ad_soyad varchar(100) not null,
    eposta varchar(50) not null,
    phone VARCHAR(15) NOT NULL,
    appointment_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
