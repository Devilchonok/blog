<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Storage;
use DateTime;

class FeedbackController extends Controller {

    public function feedbackIndex() {
        return view('feedback.feedback');
    }

    public function addFeedback(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, 
                ['name' => 'required',
                'email' => 'required|email',
                'message' => 'required',], 
                ['name.required' => 'Введите Ваше имя',
                'email.required' => 'Выберите Вашу почту',
                'email.email' => 'Введите правильный email',
                'message.required' => 'Введите сообщение',]);
            $data = $request->all();
            $create = Feedback::create($data);
            $id = $create->id;
            return view('feedback.feedbackAdded');
        }
        return view('feedback.feedback');
    }
}
