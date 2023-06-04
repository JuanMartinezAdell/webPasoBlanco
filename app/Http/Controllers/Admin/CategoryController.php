<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Store;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(10);
        //dd($categories);
        return inertia("Admin/Categories/IndexCategory", compact("categories"));
    }


    public function create()
    {
        return inertia("Admin/Categories/CreateCategory");
    }

    public function store(Store $request)
    {
        Category::create($request->validated());
    }

    /*public function edit(Category $category)
    {
        return inertia("Categories/EditCategory", compact("category"));
    }

    public function update(Category $category, Put $request)
    {
        $category->update($request->validated());
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }*/
}
