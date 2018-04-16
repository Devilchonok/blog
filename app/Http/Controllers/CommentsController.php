<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller {

    public function store(News $id) {
        $this->validate(request(), ['body' => 'required|min:2']);
        $user_id = Auth::id();
        $id->addComment(request('body'),$user_id);
        return back();
    }
	public function deleteComment($id) {
        if (!is_numeric($id))
            return view('404');
        $all = Comment::find($id);
        $all->delete();
        return back();
    }
}
