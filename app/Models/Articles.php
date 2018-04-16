<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Models\Articles;
use Carbon\Carbon;

class Articles 
{
   protected $name_table='subjects';
        public function getAll(){
        $all=DB::table($this->name_table)
                ->orderBy('id','DESC')
				->paginate(5);
        return $all;
    }
	
	public function getOne($id){
		$article=DB::table($this->name_table)
				->select(['id','author','category','title','descr','body','created_at','image'])
				->where('id',$id)
				->first();
		return $article;
	}
	 public function getAllForAdmin(){
        $all=DB::table($this->name_table)->get();
        return $all;
	 }
	 public function insert($data){
        $insert= DB::table($this->name_table)->insert($data);
       return $insert;
    }
	public function delete($id) {
        DB::table($this->name_table)
                ->where('id', $id)
                ->delete();
    }
	public function update($id,$data){
		$user = DB::table($this -> name_table)
				->where('id',$id)
				->update($data);
		return $user;
     }
	 public function getCount(){
        return DB::table($this->name_table)->count();
    }
	
	
}
