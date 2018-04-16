<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Feedback;
use App\User;
use App\Category;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\Storage;
use DateTime;

class AdminController extends Controller {

    public function adminMain() {
        $newsCount = News::count();
        $feedbacksCount = Feedback::count();
        $usersCount = User::count();
        return view('admin.adminMain')->with(['newsCount' => $newsCount, 'feedbacksCount' => $feedbacksCount, 'usersCount' => $usersCount]);
    }

    public function adminFeedbacks() {
        $all = Feedback::orderBy('id', 'DESC')->paginate(10);
        $feedbacksCount = Feedback::count();
        return view('admin.feedbacks.adminFeedbacks', ['all' => $all, 'feedbacksCount' => $feedbacksCount]);
    }

    public function adminFeedbacksShowOne($id) {
        $article = Feedback::select()->where('id', $id)->first();
        $article->status = 'viewed';
        $article->save();
        return view('admin.feedbacks.adminOneFeedback', ['article' => $article]);
    }

    public function deleteFeedback($id) {
        if (!is_numeric($id))
            return view('404');
        $all = Feedback::find($id);
        $all->delete();
        return redirect()->route('feedbacks');
    }

    public function adminUsers() {
        $all = User::get();
        $usersCount = User::count();
        return view('admin.users.adminUsers', ['all' => $all, 'usersCount' => $usersCount]);
    }

    public function adminUsersShowOne($id) {
        $article = User::select()->where('id', $id)->first();
        return view('admin.users.adminOneUser', ['article' => $article]);
    }

    public function deleteUser($id) {
        if (!is_numeric($id))
            return view('404');
        $all = User::find($id);
        $all->delete();
        return redirect()->route('users');
    }

    public function adminNews() {
        $all = News::orderBy('id', 'DESC')->paginate(10);
        $newsCount = News::count();
        return view('admin.news.adminNews', ['all' => $all, 'newsCount' => $newsCount]);
    }

    public function addNews() {
        $categ = ['category_id'];
        $categ = Category::all();
        return view('admin.news.add-content', ['categ' => $categ]);
    }

    public function form(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, ['author' => 'required',
                'category_id' => 'required',
                'title' => 'required',
                'descr' => 'required',
                'body' => 'required',], ['author.required' => 'Введите автора',
                'category_id.required' => 'Выберите категорию',
                'title.required' => 'Введите заголовок',
                'descr.required' => 'Введите краткое описание',
                'body.required' => 'Введите полный текст статьи',]);
            $data = $request->all();
            $date = new DateTime();
            $data['created_at'] = $date->format('Y-m-d H:i:s');
            if ($request->hasFile('image')) {
                $data['image'] = $this->addImage($request);
            };
            $create = News::create($data);
            $id = $create->id;
            return redirect()->route('news');
        }
        return view('admin.news.add-content');
    }

    public function addImage($request) {
        $this->validate($request, ['image' => 'required|image|max:2048'], ['image.required' => 'Загрузите изображение',
            'image.image' => 'Загруженный файл должен быть изображением',
            'image.max' => 'Максимальный размер картинки=2048']);
        $file = $request->file('image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images', $newfilename);
        return $newfilename;
    }

    public function deleteNews($id) {
        if (!is_numeric($id))
            return view('404');
        $all = News::find($id);
        $img = $all->image;
        unlink(public_path() . '/images/' . $img);
        $all->delete();
        return redirect()->route('news');
    }

    public function adminNewsShowOne($id) {
        $article = News::select()->where('id', $id)->first();
        $comments = Comment::orderBy('id', 'DESC')->paginate(4);
        return view('admin.news.adminOneNews', compact('article', 'comments'));
    }

    public function editNews($id, Request $request) {
        if ($request->method() == "POST") {
            $data = $request->all();
            $date = new DateTime();
            $data['created_at'] = $date->format('Y-m-d H:i:s');
            $data['image'] = $this->addImage($request);
            $editOne = News::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('news');
        }
        $all = News::find($id);
        if (!$all) {
            return view('404');
        } else {
            return view('admin.news.edit', ['all' => $all]);
        }
    }

}
