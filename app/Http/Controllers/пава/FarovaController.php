<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Storage;
use DateTime;

class MainController extends Controller
{
   
    public function index() {
		$all = News::orderBy('id','DESC')->paginate(4);
		return view('index.index')->with(['all' =>$all]);
	}
    public function show($id) {
		$article = News::select()->where('id',$id)->first();
		$lastFiveNews=News::orderBy('id','DESC')->limit(5);
		return view('index.article-content')->with(['article' => $article,'lastFiveNews'=>$lastFiveNews]);
	}
	public function feedbackIndex() {
		return view('feedback');
	}
        public function aboutUs() {
		return view('index.about');
	}
    
}
