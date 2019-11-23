<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class category_controller extends Controller{
	

	public function add_category(Request $request){
		 
		if($request->isMethod('post')){
            $postedData = $request->all();
        	
        	$category_obj = new Category;
			$category_obj['name'] = $postedData['category_name'];
			$category_obj['description'] = $postedData['description'];	
			$category_obj['url'] = $postedData['url'];	 
			$category_obj['parent_id'] = $postedData['parent_id'];	

			$category_obj->save();
			return redirect()->back()->with('status', 'Category has been Added successfully');
		}
        $levels = Category::where(['parent_id'=>0])->get();
		return view('admin.categories.add_category')->with(compact('levels'));
	}

	public function view_category(){
        $categories = category::get();  
        return view('admin.categories.view_category')->with(compact('categories'));
	}

	public function edit_category(Request $request,$id=null){

		if($request->isMethod('post')){
			$data = $request->all();
			Category::where(['id'=>$id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url']]);
			return redirect('admin/view-category')->with("status", "Category Has Been Updated");
		}    

	 	$categoryDetails = Category::where(['id'=>$id])->first();
	 	$levels = Category::where(['parent_id'=>0])->get();
      	return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
	}
	public function delete_category(Request $request, $id=null){
		if(!empty($id)){
			Category::where(['id'=>$id])->delete();
			return redirect()->back()->with('status', 'Category has been deleted successfully');
		}
	}
}
