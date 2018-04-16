<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Storage;
use DateTime;

class CategoriesController extends Controller
{
  public function news()
  {
    return $this->belongsTo('App\News');
  }
  public function showCategory($category){
		$all= News::orderBy('id','DESC')->where('category',$category)->paginate(4);
		
		return view('category.politic')->with(['all' =>$all]);
}

}
