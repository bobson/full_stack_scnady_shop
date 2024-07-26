
<?php



// require_once '../../Model/Product/All.php';
// require_once '../../Model/Product/Clotes.php';
// require_once '../../Model/Product/Tech.php';
// use App\Database\Database;

// use App\Model\Product\AllProducts;
// use App\Model\Product\ClothesProduct;
// use App\Model\Product\TechProduct;


class ProductResolver
{
    public function getAll($category)
    {
        $class = ucfirst($category);
        $products = new $class();
        return $products->get();
    }

    public function getOne($id)
    {
        $product = new One($id);
        return $product->get();
    }
}
