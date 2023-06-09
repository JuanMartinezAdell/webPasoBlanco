<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {
        return inertia('Gallery/indexGallery');
    }

    public function showsanta()
    {
        return inertia('Gallery/SemanaSanta/index');
    }

    public function showbanderas()
    {
        return inertia('Gallery/SemanaSanta/showBanderas');
    }

    public function showromanos()
    {
        return inertia('Gallery/SemanaSanta/showRomanos');
    }
}
