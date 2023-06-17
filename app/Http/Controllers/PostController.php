<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function index()
    {
        return inertia('Posts/Index');
    }
}
