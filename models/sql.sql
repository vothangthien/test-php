CREATE DATABASE PHP;
USE PHP;

CREATE TABLE administration (
  ID INT NOT NULL AUTO_INCREMENT,
  Name NVARCHAR(255),
  Email NVARCHAR(255),
  Password NVARCHAR(255),
  Age INT,
  Phone INT,
  Date DATE,
  Avatar VARCHAR(225) DEFAULT 'https://icons.veryicon.com/png/o/miscellaneous/rookie-official-icon-gallery/225-default-avatar.png',
  PRIMARY KEY (ID)
);

select*from administration;

select distinct PHone  from administration;


-- Table for administrators
CREATE TABLE admins (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Table for users
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Table for products
CREATE TABLE products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  quantity INT NOT NULL
);

-- Table for orders
CREATE TABLE orders (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);
SELECT * FROM users;
SELECT * FROM products;
SELECT * FROM orders WHERE user_id = <user_id>;

