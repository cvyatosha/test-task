<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['store', 'update', 'destroy']);
    // }

    public function index()
    {
        return view('admin.index', [
            'posts' => Post::orderBy('id','desc')->get(),
            'photos' => Image::all()
        ]);
    }

    public function store(Request $request)
    {
        $file_name = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $file_name, 'public');
        $request_photo = '/storage/'.$path;

        $post = new Post;

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'teg' => $request->teg
        ]);


        Image::create([
            'post_id' => $post->id,
            'url' => $request_photo
        ]);
        
        return redirect()->back(); 
    }

    public function update(Request $request, $id)
    {
        Post::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'teg' => $request->teg
        ]);

        // dd($request);

        if ($request->file('photo') !== null) {
            $file_name = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $file_name, 'public');
            $request_photo = '/storage/'.$path;
    
            Image::where('post_id', $id)->update([
                'url' => $request_photo
            ]);
        }

        return redirect()->back(); 
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->back(); 
    }
}
