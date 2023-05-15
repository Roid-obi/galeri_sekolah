<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\comment;
use App\Models\post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class welcome extends Controller
{
    public function index() 
    {
        return view('viewcen.viewcen',[
            'pinnedPosts' => Post::latest()->where('is_pinned',true)->get(),
            "title"=> "Postingan",
            'posts' => Post::latest()->paginate(6),
        ]);
    }


// halaman detail
    public function show($slug)
    {
    
        $post = post::where('slug', $slug)->firstOrFail(); //agar urlnya slug
        $post->increment('views');
        return view('viewcen.detail-viewcen', [
            'post' => $post,
        ]);
    }





}
