<?php

namespace App\Http\Actions\Product;

use App\Models\Product;

class StoreAction
{
    public function __construct()
    {}

    public function handle(array $data)
    {
        return Product::create($data);
    }
}
