<?php

namespace App\Model\Attribute;

class Attribute extends AbstractAttribute
{
    private $attributes;
    private $finalAttr;
    public function __construct($product_id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id";
        $this->attributes =
            $this->conn->query($query, ["product_id" => $product_id])
            ->fetchAll();
    }
    public function get()
    {
        foreach ($this->attributes as $attribute) {
            $attribute_items =  new Items($attribute['id']);
            $attribute_items = $attribute_items->get();
            $attribute['items'] = $attribute_items ?? $attribute_items;
            $this->finalAttr[] = $attribute;
        }

        // dd($this->finalAttr);
        return $this->finalAttr;
        // return $this->attributes;
    }
}
