<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\User;



class AdminController extends Controller{
   
   public function login(Request $request){
 
		   
		   if($request->isMethod('post')){
		   		
		   	   $data = $request->input();
		   
			   if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'],'admin'=>'1'])){
					Session::put('adminSession', $data['email']);				
					return redirect('admin/dashboard')->with("status", "You are Logged In  ".$data['email']);
			   }else{
					return redirect('admin')->with('status', "Email or Password is incorrect!!");
			   }
			}

			return view('admin.admin_login');
		
	 } 
		
	
	public function chkPassword(Request $request){

			$data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count(); 
            if ($adminCount == 1) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }
	}
	public function dashboard(){
		// if(Session::has('adminSession')){
		// 	// return view('admin/dashboard');
		// }else{
		// 	return redirect('admin')->with("status", "Please Loggin To Access!!!");
		// }
		return view('admin/dashboard');
	}
	public function logout(){
		Session::flush();
		return redirect('admin')->with('status', "You Are Logged Out successfully!!");
	}
	public function settings(){
		return view("admin/settings");
	}	
	public function UpdatePassword(Request $request){
		 if($request->isMethod('post')){
            $data = $request->all();

            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
	}
	public function vueTesting(){
			return view("html1"); 
	}
}


