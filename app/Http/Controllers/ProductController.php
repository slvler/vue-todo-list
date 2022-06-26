<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->status = "0";
        $product->save();

        return response()->json([
            'data' => $product
        ], 200);
    }
    public function edit(Request $request){

        Product::query()
            ->where('id','=', $request->item['id'])
            ->update([
                'title' => $request->item['title'],
                'desc' => $request->item['desc']
            ]);
        return response()->json([
            'data' => 'success'
        ], 200);

    }
    public function destroy(Request $request){
        Product::query()
            ->where('id','=',$request->id)
            ->delete();

        return response()->json([
            'data' => 'success'
        ], 200);
    }
    public function change(Request $request){

        Product::query()
            ->where('id','=', $request->id)
            ->update([
                'status' => $request->status
            ]);
        return response()->json([
            'data' => 'success'
        ], 200);

    }
}
