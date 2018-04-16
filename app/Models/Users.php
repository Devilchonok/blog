<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class Users {
    protected $name_table='student';
        public function getAll(){
        $all=DB::table($this->name_table)
                ->select('id','Author','title','Text')
                ->orderBy('id','DESC')
                ->limit(5)
                ->get();
        return $all;
    }
   
    public function insert($Author,$title,$Text){
        $insert= DB::table($this->name_table)->insert(
            ['Author'=>$Author,
            'title'=>$title,
            'Text'=>$Text,
            
            ]);
       return $insert;
    }
    public function delete($id) {
        DB::table($this->name_table)
                ->where('id', $id)
                ->delete();
    }
    public function getOne($id){
	$user=DB::table($this -> name_table)
		->select(['Author','title','Text'])
		->where('id','=',$id)
		->first();
	return $user;
    }
    public function update($id,$Author,$title,$Text){
	$user = DB::table($this -> name_table)
		->where('id',$id)
		->update(
		 ['Author'=>$Author,'title'=> $title,'Text'=> $Text]
		);
	return $user;
     }
}
