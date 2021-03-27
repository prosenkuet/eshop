<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class SliderController extends Controller
{
    public function index(){
    	return view('admin.add-slider');
    }

    public function all_slider(){
    	$allslider = DB::table('tbl_slider')
    									->get();
    	return view('admin.all-slider',['allslider'=>$allslider]);
    }

    public function save_slider(Request $req){
    	$data = array();
    	$data['publication_status'] = $req->publication_status;

    			
    	$image = $req->slider_image;
    	if($image){
    		$name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$fullname = $name.'.'.$ext;
    		$upload_path = 'images/';
    		$fullurl = $upload_path . $fullname;
    		$data['slider_image'] = $fullurl;

    		$success = $image->move($upload_path,$fullname);
    		if($success){

    			$data['slider_image'] = $fullurl; 
    			DB::table('tbl_slider')->insert($data);
    			Session::put('message','slider added successfully...');
    			return Redirect('/add-slider');
    		}
    	}

    	$data['slider_image'] = '';
    	DB::table('tbl_slider')->insert($data);
    	Session::put('message','slider added successfully without image...');
    	return Redirect('/add-slider');
    }

    public function unactive_slider($slider_id){
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->update(['publication_status'=>0]);
    	return Redirect('/all-slider');
    }

    public function active_slider($slider_id){
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->update(['publication_status'=>1]);
    	return Redirect('/all-slider');
    }

    public function edit_slider($slider_id){
    	$slider_info = DB::table('tbl_slider')->where('slider_id',$slider_id)->first();
    	return view('admin.edit-slider',['slider_info'=> $slider_info]);
    }

    public function update_slider(Request $req,$slider_id){

    	$data = array();
    	$data['slider_image'] = $req->slider_image;

    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->update($data);
    	return Redirect('/all-slider');
    }    

    public function delete_slider($slider_id){


    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->delete();
    	return Redirect('/all-slider');
    }    
}
