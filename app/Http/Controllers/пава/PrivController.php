<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommentsController;


class PrivController extends Controller {
    
    public function store(News $news) {
        $this->validate(request(), ['body' => 'required|min:2']);
        $news->addComment(request('body')
		);
        return back();
    }
}
