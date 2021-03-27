<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductController extends Controller
{
    public function index(){
    	return view('admin.add-product');
    }

    public function all_product(){
    	$allproduct = DB::table('tbl_product')
    									->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
    									->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
    									->select('tbl_product.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    									->get();
    	return view('admin.all-product',['allproduct'=>$allproduct]);
    }

    public function save_product(Request $req){
    	$data = array();
    	$data['product_name'] = $req->product_name;
    	$data['product_long_description'] = $req->product_long_description;
    	$data['category_id'] = $req->category_id;
    	$data['manufacture_id'] = $req->manufacture_id;
    	$data['product_price'] = $req->product_price;
    	$data['product_short_description'] = $req->product_short_description;
    	$data['product_size'] = $req->product_size;
    	$data['product_color'] = $req->product_color;
    	$data['publication_status'] = $req->publication_status;

    			
    	$image = $req->product_image;
    	if($image){
    		$name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$fullname = $name.'.'.$ext;
    		$upload_path = 'images/';
    		$fullurl = $upload_path . $fullname;
    		$data['product_image'] = $fullurl;

    		$success = $image->move($upload_path,$fullname);
    		if($success){

    			$data['product_image'] = $fullurl; 
    			DB::table('tbl_product')->insert($data);
    			Session::put('message','product added successfully...');
    			return Redirect('/add-product');
    		}
    	}

    	$data['product_image'] = '';
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','product added successfully without image...');
    	return Redirect('/add-product');
    }

    public function unactive_product($product_id){
    	DB::table('tbl_product')
    		->where('product_id',$product_id)
    		->update(['publication_status'=>0]);
    	return Redirect('/all-product');
    }

    public function active_product($product_id){
    	DB::table('tbl_product')
    		->where('product_id',$product_id)
    		->update(['publication_status'=>1]);
    	return Redirect('/all-product');
    }

    public function edit_product($product_id){
    	$product_info = DB::table('tbl_product')->where('product_id',$product_id)->first();
    	return view('admin.edit-product',['product_info'=> $product_info]);
    }

    public function update_product(Request $req,$product_id){

    	$data = array();
    	$data['product_name'] = $req->product_name;
    	$data['product_long_description'] = $req->product_long_description;

    	DB::table('tbl_product')
    		->where('product_id',$product_id)
    		->update($data);
    	return Redirect('/all-product');
    }    

    public function delete_product($product_id){


    	DB::table('tbl_product')
    		->where('product_id',$product_id)
    		->delete();
    	return Redirect('/all-product');
    }    
}
