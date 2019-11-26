<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Category extends Model{	       

    protected $table = "categories";    
    protected $primaryKey = "id";
	protected $fillable = ['name', 'description', 'url'];
	public $timestamps = false;

	public function categories(){
		return $this->hasMany('App\Category', 'parent_id');
	}
   // protected $hidden = [
   //      'password', 'remember_token',
   //  ];

}
