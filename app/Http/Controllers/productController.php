<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'productTitle'      => 'required',
            'productCategoryId' => 'nullable',
            'barcode'           => 'required|unique:products',
            'productStatus'     => 'required',
        ]);

        $product = Product::create($validated);

        if (!$product) {
            return back()->withErrors('Error occurred!');
        }

        return redirect()->route('main')->with('success', 'Product has been successfully added.');
    }

    public function showAddProductPage()
    {
        $categories = Category::all();
        return view('product/addProduct', compact('categories'));
    }

    public function listProducts()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product/listProducts', compact('products', 'categories'));
    }

    public function showEditProductPage($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product/editProduct', compact('product', 'categories'));
    }

    public function editProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'productTitle'      => 'required',
            'productCategoryId' => 'nullable',
            'barcode'           => 'required|unique:products,barcode,' . $id,
            'productStatus'     => 'required',
        ]);

        $product->update($validated);

        return redirect('productList')->with('success', 'Product has been successfully updated.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return redirect('productList')->with('error', 'Product not found.');
        }
        
        $product->delete();
        return redirect('productList')->with('success', 'Product has been successfully deleted.');
    }

    public function showProductManagementPage(){
        return view('product/productManagement');
    }
}
