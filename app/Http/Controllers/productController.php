<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class productController extends Controller
{
    public function addProduct(Request $request){
        $validated = $request->validate([
            'productTitle'      => 'required',  // must be unique for 'users' database to avoid duplication.
            'productCategoryId'     => 'nullable',
            'barcode' => 'required | unique:products',
            'productStatus'      => 'required',
        ]);

        $product = Product::create($validated);

        if(!$product){
            return back()->withErrors('Error occured!');
        }
        return redirect()->route('main')->with('success', 'product has been successfully added.');
    }

    public function showAddProductPage(){
        $categories = Category::all(); 
        return view('product/addProduct', ['categories'=> $categories]); 
    }
}