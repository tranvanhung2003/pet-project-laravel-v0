<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getList()
    {
        return $this->model->where('price', '>', 50)->get();
    }
}
