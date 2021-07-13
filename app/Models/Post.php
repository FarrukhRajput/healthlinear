<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;

    static public function latest()
    {
       return Post::orderBy('created_at', 'desc')->take(4)->get();
    }


    // public function getRouteKeyName()
    // {

    //     return 'title';
    // }
}
