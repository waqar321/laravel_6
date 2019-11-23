<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{	       

    protected $table = "categories";    
    protected $primaryKey = "id";
	protected $fillable = ['name', 'description', 'url'];
	public $timestamps = false;

   // protected $hidden = [
   //      'password', 'remember_token',
   //  ];

}
