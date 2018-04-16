<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller {

    public function search(Request $request) {
        $result = News::search($request->search)->paginate(10);
        return view('search', ['result' => $result]);
    }

}
