<?php

namespace App\Model\Attribute;

class Items extends AbstractAttribute
{
    private $attrItems;
    protected $table = 'attribute_items';
    public function __construct($attribute_id)
    {
        parent::__construct();
        if ($attribute_id) {
            $query = "SELECT * FROM " . $this->table . " WHERE attribute_id = :attribute_id";
            $this->attrItems[] =
                $this->conn->query($query, ["attribute_id" => $attribute_id])
                ->fetchAll();
        }
    }
    public function get()
    {
        // dd($this->attrItems);
        return $this->attrItems;
    }
}
