<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;

class CatController extends Controller {

    public function index() {
        $all = Category::get();
        return view('category.all', ['all' => $all]);
    }

    public function showCategory($category_id) {
        $category = Category::find($category_id);
        if ($category !== null) {
            $posts = $category->news()->paginate(4);
            return view('category.show', compact('posts'));
        }
    }

}
