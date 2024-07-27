<?php

namespace App\Model\Attribute;

class Items extends AbstractAttribute
{
    private $attribute_id;
    public $attributes;
    public function __construct($attribute_id)
    {
        parent::__construct();
        $this->attribute_id = $attribute_id;
    }
    public function get()
    {
        $query = "SELECT * FROM " . $this->items . " WHERE attribute_id = :attribute_id";

        return $this->conn->query($query, ["attribute_id" => $this->attribute_id])->fetchAll();
    }
}
