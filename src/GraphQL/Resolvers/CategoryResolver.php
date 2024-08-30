<?php

namespace App\GraphQL\Resolvers;

use App\Model\Category\Category;


class CategoryResolver
{


    public function getAll()
    {
        $category = new Category();
        return $category->set();
    }
}
