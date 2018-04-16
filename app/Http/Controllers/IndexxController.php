<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Feedback;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Storage;
use DateTime;

class IndexxController extends Controller
{
   
    public function index() {
		$all = News::orderBy('id','DESC')->paginate(4);
		return view('index.index')->with(['all' =>$all]);
	}
    public function show($id) {
		$article = News::select()->where('id',$id)->first();
		$comments =Comment::orderBy('id','DESC')->paginate(4);
		return view('index.article-content', compact('article', 'comments'));
	}
	public function feedbackIndex() {
		return view('feedback');
	}
        public function aboutUs() {
		return view('index.about');
	}
	
 
}
