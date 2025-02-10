<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $data=Post::query();
        if($request->has('search')) {
            $data->where('title','like','%'.$request->search.'%');
        }
        $data=$data->get();
        return response()->view('post.index',['data'=>$data]);
    }
    public function show(Post $post) {
        return response()->view('post.show',['post'=>$post]);
    }
    public  function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }
    public function edit(Post $post) {
        return response()->view('post.edit',['item'=>$post]);
    }
    public function update(Request $request,Post $post) {
        $post->update($request->all());
        return redirect()->route('post.index');
    }
    public function store(Request $request) {
        Post::create($request->all());
        return redirect()->route('post.index');
    }
    public function create(){
        return response()->view('post.create');
    }
}
