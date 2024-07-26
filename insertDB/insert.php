<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "shop_database";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db($dbname);

// SQL to create categories table
$sql = "CREATE TABLE IF NOT EXISTS categories (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table categories created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// SQL to create products table
// $sql = "CREATE TABLE IF NOT EXISTS products (
//     id VARCHAR(50) PRIMARY KEY,
//     name VARCHAR(100) NOT NULL,
//     inStock BOOLEAN NOT NULL,
//     description TEXT,
//     category_id INT(6) UNSIGNED,
//     brand VARCHAR(50),
//     CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table products created successfully\n";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// SQL to create galleries table
// $sql = "CREATE TABLE IF NOT EXISTS galleries (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     product_id VARCHAR(50),
//     image_url TEXT,
//     CONSTRAINT fk_product_gallery FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table galleries created successfully\n";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// SQL to create attributes table
// $sql = "CREATE TABLE IF NOT EXISTS attributes (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     product_id VARCHAR(50),
//     name VARCHAR(50),
//     type VARCHAR(50),
//     CONSTRAINT fk_product_attribute FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table attributes created successfully\n";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// SQL to create attribute_items table
// $sql = "CREATE TABLE IF NOT EXISTS attribute_items (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     attribute_id INT(6) UNSIGNED,
//     displayValue VARCHAR(50),
//     value VARCHAR(50),
//     CONSTRAINT fk_attribute_item FOREIGN KEY (attribute_id) REFERENCES attributes(id) ON DELETE CASCADE
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table attribute_items created successfully\n";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// SQL to create prices table
// $sql = "CREATE TABLE IF NOT EXISTS prices (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     product_id VARCHAR(50),
//     amount DECIMAL(10, 2),
//     currency_label VARCHAR(10),
//     currency_symbol VARCHAR(5),
//     CONSTRAINT fk_product_price FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table prices created successfully\n";
// } else {
//     echo "Error creating table: " . $conn->error;
// }




// Insert data

$json_data = require_once 'data.json';

$data = json_decode($json_data, true);

foreach ($data['data']['categories'] as $category) {
    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->bind_param("s", $category['name']);
    $stmt->execute();
}

// foreach ($data['data']['products'] as $product) {
//     $stmt = $conn->prepare("INSERT INTO products (id, name, in_stock, description, category, brand) VALUES (?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssisss", $product['id'], $product['name'], $product['inStock'], $product['description'], $product['category'], $product['brand']);
//     $stmt->execute();

//     foreach ($product['gallery'] as $url) {
//         $stmt = $conn->prepare("INSERT INTO galleries (product_id, url) VALUES (?, ?)");
//         $stmt->bind_param("ss", $product['id'], $url);
//         $stmt->execute();
//     }

//     foreach ($product['attributes'] as $attribute) {
//         $stmt = $conn->prepare("INSERT INTO attributes (product_id, name, type) VALUES (?, ?, ?)");
//         $stmt->bind_param("sss", $product['id'], $attribute['name'], $attribute['type']);
//         $stmt->execute();
//         $attribute_id = $conn->insert_id;

//         foreach ($attribute['items'] as $item) {
//             $stmt = $conn->prepare("INSERT INTO attribute_items (attribute_id, display_value, value) VALUES (?, ?, ?)");
//             $stmt->bind_param("iss", $attribute_id, $item['displayValue'], $item['value']);
//             $stmt->execute();
//         }
//     }

//     foreach ($product['prices'] as $price) {
//         $stmt = $conn->prepare("INSERT INTO prices (product_id, amount, currency_label, currency_symbol) VALUES (?, ?, ?, ?)");
//         $stmt->bind_param("sdss", $product['id'], $price['amount'], $price['currency']['label'], $price['currency']['symbol']);
//         $stmt->execute();
//     }
// }

$conn->close();
