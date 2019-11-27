<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class category_controller extends Controller{
	

	public function add_category(Request $request){
		 
		if($request->isMethod('post')){
            $postedData = $request->all();
  
           	if($postedData['status']=='1'){
           		$status = $postedData['status']; 	//Enable
           	}elseif($postedData['status']=='0'){
           		$status = $postedData['status'];	//Dsiable
           	}
           		$category_obj = new Category;
				$category_obj['name'] = $postedData['category_name'];
				$category_obj['description'] = $postedData['description'];	
				$category_obj['url'] = $postedData['url'];	 
				$category_obj['parent_id'] = $postedData['parent_id'];	
				$category_obj['status'] = $status;	

				$category_obj->save();
				return redirect()->back()->with('status', 'Category has been Added successfully');
        	
        	
		}
        $levels = Category::where(['parent_id'=>0])->get();
		return view('admin.categories.add_category')->with(compact('levels'));
	}

	public function view_category(){
        $categories = category::All();  
        return view('admin.categories.view_category')->with(compact('categories'));
	}

	public function edit_category(Request $request,$id=null){

		if($request->isMethod('post')){
			$data = $request->all();
			Category::where(['id'=>$id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url'], 'status'=>$data['status']]);
			return redirect('admin/view-category')->with("status", "Category Has Been Updated");
		}    

	 	$categoryDetails = Category::where(['id'=>$id])->first();
	 	$levels = Category::where(['parent_id'=>0])->get();

	 	//=============== status work=======================
	 	$status="";
	 	$status_extra="";
	 	$status_id_extra = "";

	 	if($categoryDetails->status==1){				//if status=1 show Enable and disable both in select option and id of both, 
	 			$status="Enable";
	 			$status_extra="Disable";
	 			$status_id_extra = 0;
	 	}else if($categoryDetails->status==0){
	 			$status="Disable";
	 			$status_extra="Enable";
	 			$status_id_extra=1;
	 	}

      	return view('admin.categories.edit_category')->with(compact('categoryDetails','levels', 'status','status_extra','status_id_extra'));
	}
	public function delete_category(Request $request, $id=null){
		if(!empty($id)){
			Category::where(['id'=>$id])->delete();
			return redirect()->back()->with('status', 'Category has been deleted successfully');
		}
	}
}
