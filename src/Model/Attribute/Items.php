<?php

namespace App\Model\Attribute;

class Items extends AbstractAttribute
{
    private $attribute_id;
    protected $table = "attribute_items";
    public function __construct($attribute_id)
    {
        parent::__construct();
        $this->attribute_id = $attribute_id;
    }
    public function get()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE attribute_id = :attribute_id";

        return $this->attribute_id ?
            $this->conn->query($query, ["attribute_id" => $this->attribute_id])->fetch()
            : [];
    }
}
