<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductAttributes;
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
		 	
    	 	//==============validation================
    	 		request()->validate([
			      'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);

    	 	//==============inserting================

    		$data= $request->all();
    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
    		$product->description = $data['description'];
    		$product->price = $data['product_price'];
    	
    		//==============imageWork================
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

			    $product->image = time().$files->getClientOriginalName();  
			    $product->save();								//this will save in db
	   	    }

			  $image = Product::latest()->first(['image']);			//first(['image'] where image is table field
			  // return Response()->json($image);
    		
    		// return redirect()->back()->with('status', 'Product has been Added successfully');
			  return redirect('admin/view-products')->with('status', "Product has been Added successfully");
    	}      
    	
    	//categories_drop_down work     
		$categories_drop_down = "<option value='' selected disabled>Select</option>";
		$categories = Category::where(['parent_id'=>0])->get();
		foreach($categories as $cat){
			$categories_drop_down .= "<option value='".$cat->id."'>".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				$categories_drop_down .= "<option value='".$sub_cat->id."'>&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
			}	
		}
    	//categories_drop_down end

		return view('admin.products.add-product')->with(compact('categories_drop_down'));
    }

    public function editProduct(Request $request, $id=null){
    		

    		if($request->isMethod('post')){
    			
				$data = $request->all();
				
				//==============imageWork================
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
				    // $ImageUpload = time().$files->getClientOriginalName();

				    Product::where(['id'=>$id])->update([
													'category_id'=>$data['category_id'], 
													'product_name'=>$data['product_name'],
													'product_code'=>$data['product_code'], 
													'product_color'=>$data['product_color'], 
													'description'=>$data['description'], 
													'price'=>$data['product_price'],
													'image'=>time().$files->getClientOriginalName()
												]);
		   	    	return redirect('admin/view-products')->with('status', "Product has been Updated successfully, new Image is added");
		   	    }else{
        	    	Product::where(['id'=>$id])->update([
													'category_id'=>$data['category_id'], 
													'product_name'=>$data['product_name'],
													'product_code'=>$data['product_code'], 
													'product_color'=>$data['product_color'], 
													'description'=>$data['description'], 
													'price'=>$data['product_price'], 
													'image'=>$data['current_image']
													]);
		   	    	return redirect('admin/view-products')->with('status', "Product has been Updated successfully, , new Image is not added");
		   	    }

			  $image = Product::latest()->first(['image']);			//first(['image'] where image is table field

				//==============imageWork================
    		}

    		$productDetail = Product::where(['id'=>$id])->first();
    		
    		//=====categories_drop_down=================     
			$categories_drop_down = "<option value='' selected disabled>Select</option>";
			$categories = Category::where(['parent_id'=>0])->get();
			foreach($categories as $cat){    //this will run 4 time because of parent_id 0 is 4 means 4 parent
					if($cat->id==$productDetail->category_id){  // e.g 5 product id 5 is selected: 1==5 then 2==5 then 3==5
							$selected = "selected";
					}else{
						$selected = "";
					}
				$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";   // $cat->id=1   > $cat->name=Air Condition
				$sub_categories = Category::where(['parent_id' => $cat->id])->get();
				foreach($sub_categories as $sub_cat){
					if($sub_cat->id==$productDetail->category_id){  //
							$selected = "selected";
					}else{
						$selected = "";
					}

					$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
				}	
			}
    		//=====categories_drop_end=================     

    		return view('admin.products.edit-product')->with(compact('productDetail','categories_drop_down'));
    }
    public function viewProduct(Request $request){
    	$products = Product::get();

    	foreach($products as $key => $val){
    		// $key means 0 1 2 3 4 5....9
    		// $val means puri row uthao

			$category_name = Category::where(['id' => $val->category_id])->first();	 //Category::where(['id' => 6])->first();		
			$products[$key]->category_name = $category_name->name;		  //$products[0]->category_name = Sports Shoes;	
		}
		return view('admin.products.view-product')->with(compact('products')); 
    } 
    public function deleteProductImage(Request $request, $id=null){
    		Product::where(['id'=>$id])->update(['image'=>'']);
    		return redirect()->back()->with('status', 'Product Is Deleted!!');
    }
    public function deleteProduct(Request $request, $id=null){
    		if(!empty($id)){
				Product::where(['id'=>$id])->delete();
				return redirect()->back()->with('status', 'Product has been deleted successfully');
			}
    }
    public function AddAttribute(Request $request, $id=null){
     		
     		if($request->isMethod('post')){
     			$data = $request->all();
     		
     			foreach($data['sku'] as $key => $val){
     					if (!empty($val)) {
						 	$ProductAttributes = new ProductAttributes();   
						 	$ProductAttributes->product_id = $data['productID'];							
						 	$ProductAttributes->sku = $val;							
						 	$ProductAttributes->size = $data['size'][$key]; 							
						 	$ProductAttributes->price = $data['price'][$key]; 							
						 	$ProductAttributes->stock = $data['stock'][$key]; 			
						 	$ProductAttributes->save();
     					}
     			}
		 	 return redirect('admin/view-products')->with('status', "Product Attributes has been Added successfully");
     		}

     		$productDetail = Product::with('attributes')->where(['id' => $id])->first();  
			/*
	 			select firstRow from Product table where id=$id and attribute is a function in which we have define
	    		Product has hasMany relationship with ProductAttributes table
	    		this is gonna give output like product table and all the fields of ProductAttirubes table
	    		integrated with the table data  
	    	*/
    		
			// $productDetail_json = json_decode(json_encode($productDetail));
    		// echo "<pre>"; print_r($productDetail_json); die;
     		return view('admin.products.add_attributes')->with(compact('productDetail'));
     }
    public function DeleteAttribute(Request $request, $id=null){
     	 ProductAttributes::where(['id'=>$id])->delete();
        return redirect()->back()->with('status', 'Product Attribute has been deleted successfully');
     }
     public function products($url=null){
     	
     	//=============show 404 message=================
     	$countCategory = Category::where(['url'=>$url])->count();
     	if($countCategory==0){
     		abort(404);
     	} 

     	//=============only show main category=================
	    $Categories = Category::with('categories')->where(['parent_id'=>0])->get();
		
     	//=================================================
		$categoryDetails = Category::where(['url'=>$url])->first();			//select * from Category where 'url'=='shoes' return 12
			
		if($categoryDetails->parent_id==0){
			
			$subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();			//select * from Category where 'parent_id'=='12' 
			$cat_ids=[];
			foreach($subCategories as $sub_cat){
				$cat_ids[] .= $sub_cat->id;						//select all ids in $cat_ids array
			}
		
			$productsAll = Product::whereIn('category_id', $cat_ids)->get();  //select * from Product where category_id == $cat_ids[], $cat_ids is an array
																			 // whereIn will compare each integer value in table and display all the result 
		}else{
			//if url is sub category
	     	$productsAll = Product::where(['category_id'=>$categoryDetails->id])->get(); 		//select * from Product where 'category_id'=='16'
		}
     	return view('products.listing')->with(compact('categoryDetails', 'productsAll', 'Categories','sub_categories'));

     }
}

