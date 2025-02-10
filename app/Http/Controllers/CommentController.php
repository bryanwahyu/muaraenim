<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use LDAP\Result;

class CommentController extends Controller
{
    public function index(Request $request) {   
        if($request->has('search')) {
            $data=Comment::query();
            $data->where('comment','like','%'.$request->search.'%');
        }
        if($request->has('post_id')) {
            $data=Comment::query();
            $data->where('post_id','=',$request->post_id);
        }
        $data=$data->get();
        return response()->view('comment.index',['data'=>$data]);
    }
    public function show(Comment $comment) {
        return response()->view('comment-detail',['comment'=>$comment]);
    }
    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect()->route('comment.index');
    }
    public function edit(Comment $comment) {
        return response()->view('comment-edit',['comment'=>$comment]);
    }
    public function store(Request $request)  {
          Comment::create($request->only('post_id','body'));
          return redirect()->route('post.show',$request->post_id);
    }
    public function update(Request $request,Comment $comment) {
        $comment->update($request->only('post_id','body'));
        return redirect()->route('comment.index');
    }
}
