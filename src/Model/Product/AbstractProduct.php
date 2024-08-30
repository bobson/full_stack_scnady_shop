<?php


namespace App\Model\Product;

use App\Model\BaseModel;
use App\Service\AttributeService;

abstract class AbstractProduct extends BaseModel
{
    protected $table = 'products';

    /**
     * Fetch all product data, including related attributes, prices, and galleries.
     *
     * @param int|null $productId Optional product ID to filter by.
     * @return array
     */
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
            LEFT JOIN galleries g on p.id = g.product_id";

        $params = [];

        $category = $this->getCategory();
        if (!empty($category)) {
            $query .= ' WHERE p.category = :category';
            $params['category'] = $category;
        }


        return $this->conn->query($query, $params)->fetchAll();
    }


    /**
     * Process the results to remove duplicates and organize data.
     *
     * @param array $results
     * @return array
     */
    protected function processProducts(array $results)
    {
        $products = [];

        foreach ($results as $row) {
            $productId = $row['id'];

            // Initialize the product array if it doesn't already exist
            if (!isset($products[$productId])) {
                $products[$productId] = [
                    'id' => $productId,
                    'name' => $row['name'],
                    'brand' => $row['brand'],
                    'inStock' => $row['inStock'],
                    'description' => $row['description'],
                    'category' => $row['category'],
                    'attributes' => [],
                    'gallery' => [],
                    'prices' => []
                ];
            }

            // Process Attributes
            if (!empty($row['attribute_id'])) {
                $attributeId = $row['attribute_id'];



                if (!isset($products[$productId]['attributes'][$attributeId])) {
                    $products[$productId]['attributes'][$attributeId] = [
                        'id' => $row['attribute_id'],
                        'name' => $row['attribute_name'],
                        'type' => $row['type'],
                        'items' => [],
                    ];
                }

                // Ensure uniqueness of items
                $itemExists = false;
                foreach ($products[$productId]['attributes'][$attributeId]['items'] as $item) {
                    if ($item['value'] === $row['value'] && $item['display_value'] === $row['display_value']) {
                        $itemExists = true;
                        break;
                    }
                }
                if (!$itemExists) {
                    $products[$productId]['attributes'][$attributeId]['items'][] = [
                        'display_value' => $row['display_value'],
                        'value' => $row['value']
                    ];
                }
            }

            // Process Prices
            if (!empty($row['amount'])) {
                $products[$productId]['prices'] = [
                    'amount' => $row['amount'],
                    'currency_label' => $row['currency_label'],
                    'currency_symbol' => $row['currency_symbol']
                ];
            }

            // Process Gallery
            if (!empty($row['image_url']) && !in_array($row['image_url'], $products[$productId]['gallery'])) {
                $products[$productId]['gallery'][] = $row['image_url'];
            }
        }



        return $products;
    }

    /**
     * This method should be implemented in child classes to define the category filter.
     *
     * @return string
     */
    abstract protected function getCategory();
}
