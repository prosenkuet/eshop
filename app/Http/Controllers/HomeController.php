<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomeController extends Controller
{
    public function index(){
    	$allproduct = DB::table('tbl_product')
    									->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
    									->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
    									->select('tbl_product.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    									->get();
    	return view('pages.home_content',['allproduct'=>$allproduct]);
    }

    // public function show_all_products(){
    // 	$allproduct = DB::table('tbl_product')
    // 									->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
    // 									->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
    // 									->select('tbl_product.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    // 									->get();
    // 	return view('pages.home_content',['allproduct'=>$allproduct]);
    // }

    public function categoryWiseProduct($category_id){
        $category_wise_product = DB::table('tbl_product')
                                        ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                                        ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
                                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                                        ->where('tbl_product.category_id',$category_id)
                                        ->get();
        return view('pages.category_wise_content',['category_wise_product'=>$category_wise_product]);
    }

    public function product_details_by_id($product_id){
        $product_by_id = DB::table('tbl_product')
                                        ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                                        ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
                                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                                        ->where('tbl_product.product_id',$product_id)
                                        ->get();
        return view('pages.product_details',['product_by_id'=>$product_by_id]);
    }
}
