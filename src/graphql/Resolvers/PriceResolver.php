
<?php


class PriceResolver
{
    public function getPrice($productId)
    {
        $prices = new Price($productId);
        return $prices->get();
    }
}
