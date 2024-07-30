<?php

namespace App\Model\Attribute;

use App\Model\BaseModel;

abstract class AbstractAttribute extends BaseModel
{
    protected $table = 'attributes';
    protected $attributes;
    protected $finalAttr;

    public  function get()
    {
        foreach ($this->attributes as $attribute) {
            $attribute_items =  new Items($attribute['id']);
            $attribute_items = $attribute_items->get();
            $attribute['items'] = $attribute_items[0];
            $this->finalAttr[] = $attribute;
        }
        return $this->finalAttr;
    }
}
