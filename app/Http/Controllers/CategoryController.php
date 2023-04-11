<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\Store;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(10);
        return inertia("Categories/IndexCategory", compact("categories"));
    }


    public function create()
    {
        return Inertia::render("Categories/CreateCategory");
    }

    public function store(Store $request)
    {

        Category::create($request->validated());
    }
}
