<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class users_controller extends Controller
{
 	public function register(Request $request){

 		if ($request->isMethod('post')) {				//e.g output 	true 
			$data = $request->all();
			
			$usersCount = User::where('email', $data['email'])->count();
			if($usersCount!=0){
				return redirect()->back()->with('status', 'Email Already Exist!!');
			}else{
				return redirect()->back()->with('status', 'You Are registered Successfully!!');
			}
		}	
 		return view('users.register');

 	}
}
