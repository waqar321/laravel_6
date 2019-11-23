<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Auth;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;
use Image;
Use App\Photo;

class Productscontroller extends Controller
{
    public function addProduct(Request $request){

    	 if($request->isMethod('post')){
		 	
    	 	//============================================================
    	 		request()->validate([
			      'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			 ]);

    	 	//============================================================

    		$data= $request->all();

    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
    		$product->description = $data['description'];
    		$product->price = $data['product_price'];
    		//==================image work=================
    		if ($files = $request->file('product_image')) {			    

			    // for save original image
			    $ImageUpload = Image::make($files);
			    $originalPath = 'images/backend_images';		//this will save original size
			    $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
			    
			    // for save small image
			    $thumbnailPath = 'images/backend_images/products/small/';
			    $ImageUpload->resize(100,125);					//this will save small size
			    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
  				
  				// for save medium image
			    $thumbnailPath = 'images/backend_images/products/medium/';
			    $ImageUpload->resize(300,125);					//this will save medium size
			    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
				
				// for save large image
			    $thumbnailPath = 'images/backend_images/products/large/';
			    $ImageUpload->resize(500,125);					//this will save large size
			    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());

			    $product->image = time().$files->getClientOriginalName();  //this will save in db
			    $product->save();
	   	    }

			  $image = Product::latest()->first(['image']);			//first(['image'] where image is table field
			  // return Response()->json($image);
    		
    		return redirect()->back()->with('status', 'Product has been Added successfully');
    	}      
    	      
		$categories_drop_down = "<option value='' selected disabled>Select</option>";
		$categories = Category::where(['parent_id'=>0])->get();
		foreach($categories as $cat){
			$categories_drop_down .= "<option value='".$cat->id."'>".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				$categories_drop_down .= "<option value='".$sub_cat->id."'>&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
			}	
		}
		return view('admin.products.add-product')->with(compact('categories_drop_down'));
    }

    public function viewProduct(){
    	return "its working baby";
    }
}

