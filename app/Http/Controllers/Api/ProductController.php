<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;

class ProductController extends Controller
{
    public function listProducts()
    {
        $products = Product::all();
        if(!$products){
            return response()->json([
                'message' => 'No products found.'
            ],404);
        }
        return response()->json([
            'products' => $products
        ],200);

    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productTitle'      => 'required',
            'productCategoryId' => 'nullable',
            'barcode'           => 'required|unique:products',
            'productStatus'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $product = Product::create($validator->validated());

        if ($product) {
            return response()->json([
                'message' => 'Product successfully created.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to create product. Something went wrong.'
            ], 500);
        }
    }

    public function editProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(),[
            'productTitle'      => 'required',
            'productCategoryId' => 'nullable',
            'barcode'           => 'required|unique:products,barcode,' . $id,
            'productStatus'     => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $product->update($validator->validated());

        return response()->json([
            'message' => 'Product has been successfully updated.'
        ], 200);
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        if(!$product){
            return response()->json([
                'message' => 'Product not found!'
            ],404);
        }
        
        $product->delete();
        return response()->json([
            'message' => 'Product has been successfully deleted.'
        ],200);
    }

}
