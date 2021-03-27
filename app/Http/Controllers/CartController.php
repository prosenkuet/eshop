<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class CartController extends Controller
{
    public function add_to_cart(Request $req){

    	$productInfo = DB::table('tbl_product')
    									->where('product_id',$req->product_id)
    									->first();
    	$data['qty'] = $req->qty;
    	$data['name'] = $productInfo->product_name;
    	$data['id'] = $productInfo->product_id;
    	$data['price'] = $productInfo->product_price;
    	$data['options']['image'] = $productInfo->product_image;
    	$data['options']['color'] = $productInfo->product_color;

    	Cart::add($data);
    	return Redirect('/show-cart');
    }

    public function show_cart(){

    	$category_wise_prodcut = DB::table('tbl_category')
    												->where('publication_status','1')
    												->get();
    	return view('pages.add_to_cart',['category_wise_prodcut'=>$category_wise_prodcut]);
    }

    public function delete_from_cart($rowid){

    	Cart::update($rowid,0);
    	return Redirect('/show-cart');
    }

    public function update_cart(Request $req){

    	$rowId = $req->rowId;
    	$qty = $req->qty;
    	Cart::update($rowId,$qty);
    	return Redirect('/show-cart');
    }


}
