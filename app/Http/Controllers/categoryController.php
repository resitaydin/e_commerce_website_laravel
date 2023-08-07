<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function addCategory(Request $request){
        $validated = $request->validate([
            'categoryTitle'      => 'required | unique:categories',  // must be unique for 'users' database to avoid duplication.
            'categoryDescription'     => '',
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
}
