<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('posts', compact('posts', 'search'));
    }
        
            // menyimpan post baru ke database
            public function store(Request $request) {
                $post = new Post();
                $post->title = $request->input('title');
                $post->created_by = auth()->user()->name;
                $post->content = $request->input('content');
                $post->slug = Str::slug($request->title);
                $post->is_pinned = 0;
                
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $fileName = $image->getClientOriginalName();
                    $image->storeAs('public/images/', $fileName);
                    $post->image = $fileName;
                }
                
                $post->save();
                
                return redirect()->route('post.index');
            }

        
           // menyimpan perubahan pada post 
            public function update(Request $request, $id) {
                $post = Post::findOrFail($id);
                $post->title = $request->input('title');
                $post->created_by = auth()->user()->name;
                $post->content = $request->input('content');
                $post->slug = Str::slug($request->title);
                $post->is_pinned = 0;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $fileName = $image->getClientOriginalName();
                    $image->storeAs('public/images/', $fileName);

                    $previousImage = $post->image;
                    if ($previousImage !== null) {
                        Storage::delete('public/images/' . $previousImage);
                    }

                    $post->image = $fileName;
                }

                $post->save();
                
                return redirect()->route('post.index');
            }

        
            // menghapus sopir dari database
            public function destroy($id) {
                $post = Post::findOrFail($id);
                $path = public_path('storage/images/'.$post->gambar); 
                if(File::exists($path)){  //hapus file gambar
                    File::delete($path);
                }
                $post->delete();
                return redirect()->route('post.index');
            }
}
