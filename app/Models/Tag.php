<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'text'];

    public function articles()
    {
        $this->hasMany(Article::class);
    }
}
