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


        // category di klik
        public function showCategory(Category $category) {
            $title = "Categories : $category->name";
            $tags = Tag::all();
            $posts = $category->categories()->paginate(4);
            $pinnedPosts = $category->categories()->where('is_pinned',true)->get()->all();
            return view('viewcen.viewcen',compact(['posts','pinnedPosts','tags','title']));
        }
    
    
        // tag di klik
        public function showTag(Tag $tag) {
            $title = "Tags : $tag->name";
            $tags = Tag::all();
            $posts = $tag->tags()->paginate(4);
            $pinnedPosts = $tag->tags()->where('is_pinned',true)->get()->all();
            return view('viewcen.viewcen',compact(['posts','pinnedPosts','tags','title']));
        }
    



}
