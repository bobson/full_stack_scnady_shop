<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=scandi_shop', 'root', 'root');


$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true)['data'];



// Insert categories
$categories = [
    ['name' => 'all'],
    ['name' => 'clothes'],
    ['name' => 'tech']
];

foreach ($categories as $category) {
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
    $stmt->execute([':name' => $category['name']]);
}

// Insert products and related data
$products = $data['products'];
// print_r($products);
// die();

foreach ($products as $product) {
    // Insert product
    $stmt = $pdo->prepare("INSERT INTO products (id, name, inStock, description, category, brand) VALUES (:id, :name, :in_stock, :description, :category, :brand)");
    $stmt->execute([
        ':id' => $product['id'],
        ':name' => $product['name'],
        ':in_stock' => $product['inStock'],
        ':description' => $product['description'],
        ':category' => $product['category'],
        ':brand' => $product['brand']
    ]);

    // Insert galleries
    foreach ($product['gallery'] as $image_url) {
        $stmt = $pdo->prepare("INSERT INTO galleries (product_id, image_url) VALUES (:product_id, :image_url)");
        $stmt->execute([
            ':product_id' => $product['id'],
            ':image_url' => $image_url
        ]);
    }

    // Insert attributes and attribute items
    foreach ($product['attributes'] as $attribute) {
        $stmt = $pdo->prepare("INSERT INTO attributes (product_id, name, type) VALUES (:product_id, :name, :type)");
        $stmt->execute([
            ':product_id' => $product['id'],
            ':name' => $attribute['name'],
            ':type' => $attribute['type']
        ]);

        $attribute_id = $pdo->lastInsertId();

        foreach ($attribute['items'] as $item) {
            $stmt = $pdo->prepare("INSERT INTO attribute_items ( attribute_id, display_value, value) VALUES ( :attribute_id, :display_value, :value)");
            $stmt->execute([
                // ':id' => $item['id'],
                ':attribute_id' => $attribute_id,
                ':display_value' => $item['displayValue'],
                ':value' => $item['value']
            ]);
        }
    }

    // Insert prices
    foreach ($product['prices'] as $price) {
        $stmt = $pdo->prepare("INSERT INTO prices (product_id, amount, currency_label, currency_symbol) VALUES (:product_id, :amount, :currency_label, :currency_symbol)");
        $stmt->execute([
            ':product_id' => $product['id'],
            ':amount' => $price['amount'],
            ':currency_label' => $price['currency']['label'],
            ':currency_symbol' => $price['currency']['symbol']
        ]);
    }
}
