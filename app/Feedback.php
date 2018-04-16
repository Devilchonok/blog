<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Feedback extends Model
{
	protected $name='feedbacks';
      public $fillable=['name','email','message'];
}
