<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use Auth;


class SiteController extends Controller
{
    public function index()
    {
        return view('site.index', ['posts' => Post::orderBy('id','desc')->get()]);
    }

    public function show($id)
    {
        return view('site.view', [
            'post' => Post::where('id', $id)->first(),
            'photo' => Image::where('post_id', $id)->first()->url
        ]);
    }

    public function logout()
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('site.index', ['posts' => Post::all()]);
    }
}
