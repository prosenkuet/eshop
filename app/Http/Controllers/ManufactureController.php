<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ManufactureController extends Controller
{
    public function index(){
    	return view('admin.add-manufacture');
    }

    public function all_manufacture(){
    	$allmanufacture = DB::table('tbl_manufacture')->get();
    	return view('admin.all-manufacture',['allmanufacture'=>$allmanufacture]);
    }

    public function save_manufacture(Request $req){
    	$data = array();
    	$data['manufacture_name'] = $req->manufacture_name;
    	$data['manufacture_description'] = $req->manufacture_description;
    	$data['publication_status'] = $req->publication_status;

    	DB::table('tbl_manufacture')->insert($data);
    	Session::put('message','manufacture added successfully...');
    	return Redirect('/add-manufacture');
    }

    public function unactive_manufacture($manufacture_id){
    	DB::table('tbl_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->update(['publication_status'=>0]);
    	return Redirect('/all-manufacture');
    }

    public function active_manufacture($manufacture_id){
    	DB::table('tbl_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->update(['publication_status'=>1]);
    	return Redirect('/all-manufacture');
    }

    public function edit_manufacture($manufacture_id){
    	$manufacture_info = DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->first();
    	return view('admin.edit-manufacture',['manufacture_info'=> $manufacture_info]);
    }

    public function update_manufacture(Request $req,$manufacture_id){

    	$data = array();
    	$data['manufacture_name'] = $req->manufacture_name;
    	$data['manufacture_description'] = $req->manufacture_description;

    	DB::table('tbl_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->update($data);
    	return Redirect('/all-manufacture');
    }    

    public function delete_manufacture($manufacture_id){


    	DB::table('tbl_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->delete();
    	return Redirect('/all-manufacture');
    }    
}
