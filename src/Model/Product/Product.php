<?php

namespace App\Model\Product;

class Product extends AbstractProduct
{

    protected function getCategory()
    {
        return '';
    }

    protected function fetchProductData($productId = null)
    {
        $query = "SELECT p.id, p.name, p.brand, p.description, p.category, p.inStock,
            a.id AS attribute_id, a.name AS attribute_name, a.type, ai.value, ai.display_value,
            pr.amount, pr.currency_label, pr.currency_symbol,
            g.image_url
            FROM " . $this->table . " p
            LEFT JOIN attributes a ON p.id = a.product_id
            LEFT JOIN attribute_items ai ON a.id = ai.attribute_id
            LEFT JOIN prices pr on p.id = pr.product_id
            LEFT JOIN galleries g on p.id = g.product_id  WHERE p.id = :productId";

        $params = [];
        $params['productId'] = $productId;


        return $this->conn->query($query, $params)->fetchAll();
    }

    public function fetchProductById($productId)
    {
        $data = $this->fetchProductData($productId);
        $products = $this->processProducts($data);
        return !empty($products) ? reset($products) : null;
    }
}
