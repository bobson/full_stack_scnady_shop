<?php

namespace App\GraphQL\Resolvers;

use App\Model\Gallery\Gallery;

class GalleryResolver
{
    public function getGallery($productId)
    {
        $prices = new Gallery($productId);
        return $prices->get();
    }
}
