<?php

namespace App\Http\Actions\Product;

use App\Models\Product;

class DeleteAction
{
    public function __construct()
    {}
    public function handle($id)
    {
        $product = Product::whereId($id)->firstOrFail();
        return $product->delete();
    }
}
