<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CabinetController extends Controller {

    public function __invoke(){
        $user=Auth::user();
        return view('cabinet',['user'=>$user]);
    }

}
