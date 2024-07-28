<?php

namespace App\Model\Attribute;

class Attribute extends AbstractAttribute
{
    private $product_id;
    private $attribute;
    public function __construct($product_id)
    {
        parent::__construct();
        $this->product_id = $product_id;
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id";
        $this->attribute = $this->conn->query($query, ["product_id" => $this->product_id])->fetch();
    }
    public function get()
    {
        $attribute_items =  new Items($this->attribute['id']);
        $attribute_items = $attribute_items->get();
        $attribute_items ? $this->attribute['items'] = $attribute_items : [];
        return $this->attribute;
        // return $this->attribute;
    }
}
