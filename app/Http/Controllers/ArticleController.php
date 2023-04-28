<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Put;
use App\Http\Requests\Article\Store;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::paginate(10);
        //dd($articles);
        return inertia("Articles/IndexArticle", compact("articles"));
    }


    public function create()
    {
        $categories = Category::get();
        return inertia("Articles/CreateArticle", compact("categories"));
    }


    public function store(Store $request)
    {
        //dd($request);
        $article = Article::create($request->validated());
        //dd($article);
        $this->upload($request, $article);
        return to_route('articles.indexarticle')->with('message', "Updated article successfully");
    }

    public function edit(Article $article)
    {
        $categories = Category::get();
        return inertia("Articles/EditArticle", compact("article", "categories"));
    }

    public function update(Article $article, Put $request)
    {
        $article->update($request->validated());
        return to_route('articles.indexarticle')->with('message', "Updated article successfully");
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('articles.indexarticle')->with('message', "Deleted article successfully");
    }

    public function upload(Request $request, Article $article)
    {

        $request->validate(
            [
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:78125'
            ]
        );

        Storage::disk("public_upload")->delete("image/article/" . $article->image);

        $data['image'] = $filename = time() . "." . $request['image']->extension();

        $request->image->move(public_path("image/article"), $filename);

        $article->update($data);
        return to_route('articles.indexarticle')->with('message', "Upload article successfully");
    }
}
