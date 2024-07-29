<?php

namespace App\Model\Attribute;

class Items extends AbstractAttribute
{
    private $attrItems;
    public function __construct($attribute_id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->itemsTable . " WHERE attribute_id = :attribute_id";
        $this->attrItems[] =
            $this->conn->query($query, ["attribute_id" => $attribute_id])
            ->fetchAll();
    }
    public function get()
    {
        // dd($this->attrItems);
        return $this->attrItems;
    }
}
