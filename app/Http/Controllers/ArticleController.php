<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Articles/IndexArticle');
    }
}
