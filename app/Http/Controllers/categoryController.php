<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function addCategory(Request $request){
        $validated = $request->validate([
            'categoryTitle'      => 'required | unique:categories',  // must be unique for 'users' database to avoid duplication.
            'categoryDescription'     => 'required',
            'status'      => 'required',
        ]);

        $category = Category::create($validated);

        if(!$category){
            return back()->withErrors('Error occured!');
        }
        return redirect()->route('main')->with('success', 'Category has been successfully added.');
    }

    public function showAddCategoryPage(){
        return view('category/addCategory');
    }

    public function listCategories(){
        $allCategories = Category::all();
        return view('category/listCategories', ['categories' => $allCategories]);
    }


    public function showEditCategoryPage(){
        return view('category/editCategory');
    }

    public function showDeleteCategoryPage(){
        return view('category/deleteCategory');
    }

}
