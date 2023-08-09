<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class productController extends Controller
{
    public function addProduct(Request $request){
        $validated = $request->validate([
            'productTitle'      => 'required',
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

    public function listProducts(){
        $categories = Category::all(); 
        $allProducts = Product::all();
        return view('product/listProducts', ['products' => $allProducts] ,['categories' => $categories]);
    }

    public function showEditProductPage($id){
        $product = Product::find($id);
        $categories = Category::all(); 
        return view('product/editProduct', ['product' => $product] , ['categories' => $categories]);
    }

    public function editProduct(Request $request, $id){
        $product = Product::find($id);

        $validated = $request->validate([
            'productTitle'      => 'required',
            'productCategoryId'     => 'nullable',
            'barcode' => 'required | unique:products,barcode,'.$id,
            'productStatus'      => 'required',
        ]);

        $product->update($validated);

        return redirect('productList')->with('success', 'Product has been successfully updated.');
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('productList')->with('success', 'Product has been successfully deleted.');
    }
}