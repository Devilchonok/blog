<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }
}
