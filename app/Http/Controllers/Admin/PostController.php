<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $posts = Post::paginate(10);
        //dd($articles);
        return inertia("Posts/IndexPost", compact("posts"));
    }


    public function create()
    {
        $categories = Post::get();
        return inertia("Articles/SaveArticle", compact("categories"));
    }


    public function store(Store $request)
    {
        //dd($request);
        $post = Post::create($request->validated());
        //dd($article);
        $this->upload($request, $post);
        return to_route('posts.indexpost')->with('message', "Updated article successfully");
    }

    /*public function edit(Article $article)
    {
        $categories = Category::get();
        return inertia("Articles/SaveArticle", compact("article", "categories"));
    }

    public function update(Article $article, Put $request)
    {
        $article->update($request->validated());
        //$this->upload($request, $article);
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

        //dd($request['image']);


        Storage::disk("public_upload")->delete("image/article/" . $article->image);

        $data['image'] = $filename = time() . "." . $request['image']->extension();

        $request->image->move(public_path("image/article"), $filename);

        $article->update($data);
        return to_route('articles.indexarticle')->with('message', "Upload image to article successfully");
    }
}*/
}
