<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function mainCategories(){

    	$Categories = Category::where(['parent_id'=>0])->get();
    	$mainCategories = json_decode(json_encode($Categories));
    	return $mainCategories;
  //   $print = json_decode(json_encode($Categories));
    	// $test = json_decode(json_encode($mainCategories));
    	// dd($test); die;
    } 
}
