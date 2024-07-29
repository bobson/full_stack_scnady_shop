<?php

namespace App\Model\Attribute;

use App\Model\BaseModel;

abstract class AbstractAttribute extends BaseModel
{
    protected $table = 'attributes';
    protected $itemsTable = 'attribute_items';
}
