<?php

namespace App\Http\Actions\Product;

use App\Models\Product;

class UpdateAction
{
    public function __construct()
    {}
    public function handle(array $data)
    {
        $product = Product::whereId($data['id'])->first();

        return $product->update($data);
    }
}
