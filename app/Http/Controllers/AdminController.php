<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use DB;

use App\Http\Requests;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){
    	return view('admin_login');
    }

    	
    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	// return $admin_password;

    	$result = DB::table('tbl_admin')
    		->where('admin_email',$admin_email)
    		->where('admin_password',$admin_password)
    		->first();

    	if($result){
    		Session::put('admin_id',$result->admin_id);
    		Session::put('admin_email',$result->admin_email);
    		Session::put('admin_name',$result->admin_name);

    		return Redirect::to('/dashboard');
    	}else{
    		Session::put('message','User email or password is not valid');
    		return Redirect::to('/admin');
    	}
    }

    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        // $user->token;
    }

}
