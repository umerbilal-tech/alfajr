<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function setCampus(Request $request){

		if (Hash::check($request->password, Auth::user()->password)) {
			Session::put('campus_id', $request->campus_id);
			return back()->with('message','Campus Selected Successfully');
		}else{
			return back()->with('hasError','Invalid Password');
		}

	}


	public function update_image(Request $request){
    	$request->validate([
    		"image"=>"required|mimes:jpeg,bmp,png|max:2048",
		]);

    	$user=Auth::user();
		$extension = "." . $request->image->getClientOriginalExtension();
		$name = basename($request->image->getClientOriginalName(), $extension) . time();
		$name = $name . $extension;
		Storage::disk('uploads')->put('images/' . $name, file_get_contents($request->image));

		$user->image = $name;
		if($user->save()){
			return back()->with('message','Image Updated');
		}else{
			return back()->with('hasError','Error Occurred');
		}
	}

	public function update_email(Request $request){
    	$request->validate([
    		"current_email"=>"required",
			"new_email"=>"required|unique:users,email",
			"confirm_email"=>"required",
		]);

    	$user=Auth::user();
    	if($user->email==$request->current_email){
    		if($request->new_email==$request->confirm_email){
    			$user->email=$request->new_email;
    			if($user->save()){
    				return back()->with('message','Email Updated');
				}else{
    				return back()->with('hasError','Error');
				}
			}else{
    			return back('hasError','New Email and Confirm Email must be same');
			}

		}else{
    		return back()->with('hasError','Invalid Email');
		}

	}

	public function update_password(Request $request){
    	$request->validate([
    		"current_password"=>"required",
			"password"=>"required|confirmed"
		]);

    	$user=Auth::user();
    	if(Hash::check($request->current_password,$user->password)){
    		$user->password=bcrypt($request->password);
    		if($user->save()){
    			return back()->with('message','Password Updated');
			}else{
    			return back()->with('hasError','Error');
			}
		}else{
    		return back()->with('hasError','Invalid Password');
		}

	}

	public function web_settings(){
    	$projects=Project::all();
    	return view('admin.settings.website',compact('projects'));
	}
}
