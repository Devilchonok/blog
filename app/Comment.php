<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model {

    protected $fillable = ['body', 'user_id', 'post_id'];
    public function news() {
        return $this->belongsTo(News::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
