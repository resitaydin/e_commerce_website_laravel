<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function listCategories(){
        $allCategories = Category::all();
        if(!$allCategories){
            return response()->json([
                'message' => 'No categories found.'
            ],404);
        }
        return response()->json([
            'categories' => $allCategories
        ],200);
    }

    public function addCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'categoryTitle' => 'required|unique:categories',
            'categoryDescription' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $category = Category::create($validator->validated());

        if (!$category) {
            return response()->json([
                'message' => 'Error occurred while adding the category.'
            ], 500);
        }

        return response()->json([
            'message' => 'Category has been successfully added.'
        ], 201);
    }

    public function editCategory(Request $request, $id){
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(),[
            'categoryTitle'      => 'required | unique:categories,categoryTitle,'.$id,
            'categoryDescription'     => 'required',
            'status'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Update the category with the validated data
        $category->update($validator->validated());

        return response()->json([
            'message' => 'Category has been successfully updated.'
        ], 200);
    }

    public function deleteCategory($id){
        $category = Category::find($id);

        if(!$category){
            return response()->json([
                'message' => 'Category not found!'
            ],404);
        }

        // finding all the products that have this categoryId.
        $products = Product::where('productCategoryId', $id)->get();

        // Looping through them and setting them to null.
        foreach ($products as $product) {
            $product->productCategoryId = null;
            $product->save();
        }

        $category->delete();
        
        return response()->json([
            'message' => 'Category has been successfully deleted.'
        ],200);
    }   

}
