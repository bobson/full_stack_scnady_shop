<?php

namespace App\Service;

class AttributeService
{
    /**
     * Process attributes from multiple rows and aggregate them.
     *
     * @param array $rows
     * @return array
     */
    public function processAttributes(array &$product, array $row)
    {
        if (!empty($row['attribute_id'])) {
            $attributeId = $row['attribute_id'];

            if (!isset($product['attributes'][$attributeId])) {
                $product['attributes'][$attributeId] = [
                    'id' => $row['attribute_id'],
                    'name' => $row['attribute_name'],
                    'type' => $row['type'],
                    'items' => [],
                ];
            }

            // Ensure uniqueness of items
            $itemExists = false;
            foreach ($product['attributes'][$attributeId]['items'] as $item) {
                if ($item['value'] === $row['value'] && $item['display_value'] === $row['display_value']) {
                    $itemExists = true;
                    break;
                }
            }
            if (!$itemExists) {
                $product['attributes'][$attributeId]['items'][] = [
                    'display_value' => $row['display_value'],
                    'value' => $row['value']
                ];
            }
        }
    }
}
