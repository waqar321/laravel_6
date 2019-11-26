<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class Indexcontroller extends Controller
{
    public function Index(){
    	$ShowproductsAll = Product::get();
    	$productsRandomly = Product::inRandomOrder()->get();
    	$productsAll = Product::orderBy('id','desc')->get();

    	$Categories = Category::with('categories')->where(['parent_id'=>0])->get();
 		return view('index')->with(compact('productsAll','productsRandomly','Categories'));
    }
}
