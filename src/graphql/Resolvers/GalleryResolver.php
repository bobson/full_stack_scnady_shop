
<?php

class GalleryResolver
{
    public function getGallery($productId)
    {
        $prices = new Gallery($productId);
        return $prices->get();
    }
}
