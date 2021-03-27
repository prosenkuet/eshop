<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class CategoryController extends Controller
{
    public function index(){
    	return view('admin.add-category');
    }

    public function all_category(){
    	$allCategory = DB::table('tbl_category')->get();
    	return view('admin.all-category',['allcategory'=>$allCategory]);
    }

    public function save_category(Request $req){
    	$data = array();
    	$data['category_name'] = $req->category_name;
    	$data['category_description'] = $req->category_description;
    	$data['publication_status'] = $req->publication_status;

    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Category added successfully...');
    	return Redirect('/add-category');
    }

    public function unactive_category($category_id){
    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update(['publication_status'=>0]);
    	return Redirect('/all-category');
    }

    public function active_category($category_id){
    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update(['publication_status'=>1]);
    	return Redirect('/all-category');
    }

    public function edit_category($category_id){
    	$category_info = DB::table('tbl_category')->where('category_id',$category_id)->first();
    	return view('admin.edit-category',['category_info'=> $category_info]);
    }

    public function update_category(Request $req,$category_id){

    	$data = array();
    	$data['category_name'] = $req->category_name;
    	$data['category_description'] = $req->category_description;

    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update($data);
    	return Redirect('/all-category');
    }    

    public function delete_category($category_id){


    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->delete();
    	return Redirect('/all-category');
    }    
}
