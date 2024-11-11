<?php

namespace App\Http\Controllers;

use App\Http\Actions\Product\DeleteAction;
use App\Http\Actions\Product\StoreAction;
use App\Http\Actions\Product\UpdateAction;
use App\Http\Requests\ProductChangeRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductIndexResource;
use App\Http\Utils\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Message;
    public function index()
    {
        $products = Product::all();

        $data['products'] = ProductIndexResource::collection($products);
        return $this->sendResponse(data: $data, message: "Başarılı");
    }
    public function store(ProductStoreRequest $request)
    {
        $product = (new StoreAction())->handle($request->validated());

        $data['product'] = $product;
        return $this->sendResponse(data: $data, message: "Başarılı");
    }
    public function edit(ProductEditRequest $request){

       $product = (new UpdateAction())->handle($request->validated());

       $data['product'] = $product;
       return $this->sendResponse(data: $data, message: "Başarılı");
    }
    public function destroy($id){

        $product = (new DeleteAction())->handle($id);

        $data['product'] = $product;
        return $this->sendResponse(data: $data, message: "Başarılı");
    }
    public function change(ProductChangeRequest $request){

        $product = (new UpdateAction())->handle($request->validated());

        $data['product'] = $product;
        return $this->sendResponse(data: $data, message: "Başarılı");
    }
}
