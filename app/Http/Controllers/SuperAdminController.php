<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Session;
session_start();

class SuperAdminController extends Controller
{

	public function index(){
		$this->authCheck();
		return view('admin.dashboard');
	}

    public function logout(){
    	Session::flush();
    	return Redirect('/admin');
    }

    public function authCheck(){
    	$admin_id = Session::get('admin_id');
    	if($admin_id){

    	}else{
    		return Redirect('/admin')->send();
    	}
    }

}
