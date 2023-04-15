<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\Put;
use App\Http\Requests\Category\Store;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(10);
        //dd($categories);
        return inertia("Categories/IndexCategory", compact("categories"));
    }


    public function create()
    {
        return Inertia::render("Categories/CreateCategory");
    }

    public function store(Store $request)
    {
        sleep(1);
        Category::create($request->validated());
    }

    public function edit(Category $category)
    {
        return Inertia::render("Categories/EditCategory", compact("category"));
    }

    public function update(Category $category, Put $request)
    {
        $category->update($request->validated());
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
