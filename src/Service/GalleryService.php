<?php

namespace App\Service;

class GalleryService
{
    public function processGallery(array &$product, array $row)
    {
        if (!empty($row['image_url']) && !in_array($row['image_url'], $product['gallery'])) {
            $product['gallery'][] = $row['image_url'];
        }
    }
}
