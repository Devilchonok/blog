<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
    public $fillable = ['author','title', 'descr', 'body', 'image','category_id'];
    use Searchable;
    public function searchableAs() {
        return 'news';
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
     public function addComment($body,$user_id) {
        $this->comments()->create(compact('body','user_id'));
    }
	public function category() {
        return $this->belongsTo(Category::class);
    }
}
