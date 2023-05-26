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
            "tanda"=>'',
            'posts' => Post::latest()->paginate(20),
        ]);
    }

    public function posts(Request $request) {
        $search = $request->input('search');
        $categories = Category::all();
        $tags = Tag::all();
        $title = "Semua Postingan";
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            // ->get();
            ->paginate(20); // menampilkan 10 data per halaman
        return view('viewcen.posts-viewcen', compact('posts', 'categories', 'tags', 'search','title'));
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
            $tanda = " : $category->name";
            $title = "Categories";
            $tags = Tag::all();
            $posts = $category->categories()->paginate(4);
            $pinnedPosts = $category->categories()->where('is_pinned',true)->get()->all();
            return view('viewcen.viewcen',compact(['posts','pinnedPosts','tags','title','tanda']));
        }
    
    
        // tag di klik
        public function showTag(Tag $tag) {
            $tanda = " : $tag->name";
            $title = "Tags";
            $tags = Tag::all();
            $posts = $tag->tags()->paginate(4);
            $pinnedPosts = $tag->tags()->where('is_pinned',true)->get()->all();
            return view('viewcen.viewcen',compact(['posts','pinnedPosts','tags','title','tanda']));
        }
    



}
