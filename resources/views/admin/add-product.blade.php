@extends('admin_layout')
@section('admin_content')

<!-- general form elements -->
<div class="card card-light mt-3">
  <div class="card-header">
    <h3 class="card-title">Product</h3>


  </div>
    	<p class="alert-success">
			<?php
			$message = Session::get('message');

			if($message){
				echo "<br>".$message;
				Session::put('message',NULL);
			}
			?>
 		</p>
  <!-- /.card-header -->
  <!-- form start -->
  <form enctype="multipart/form-data" method="post" action="{{url('/save-product')}}" >
  	{{@csrf_field()}}
    <div class="card-body">
      <div class="form-group col-md-3">
        <label>Name</label>
        <input type="text" class="form-control" name="product_name" placeholder="Enter ...">
      </div>
      <div class="form-group col-md-3">
        <label>Category</label>
        <select class="form-control select2" name="category_id" style="width: 100%;">
          <?php
          $allcategory = DB::table('tbl_category')->get()->where('publication_status','1');
          ?>
          @foreach($allcategory as $category)
            <option value='{{$category->category_id}}'>{{$category->category_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Brand</label>
        <select class="form-control select2" name="manufacture_id" style="width: 100%;">
          <?php
          $allcategory = DB::table('tbl_manufacture')->get()->where('publication_status','1');
          ?>
          @foreach($allcategory as $category)
            <option value='{{$category->manufacture_id}}'>{{$category->manufacture_name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-3">
        <label>Price</label>
        <input type="text" class="form-control" name="product_price" placeholder="Enter ...">
      </div>
      <div class="form-group col-md-3">
        <label>Short Description</label>
        <textarea class="form-control" rows="3" name="product_short_description" placeholder="Enter ..."></textarea>
      </div>
      <div class="form-group col-md-5">
        <label>Long Description</label>
        <textarea class="form-control" rows="3" name="product_long_description" placeholder="Enter ..."></textarea>
      </div>
      <div class="form-group col-md-3">
        <label>Size</label>
        <input type="text" class="form-control" name="product_size" placeholder="Enter ...">
      </div>
      <div class="form-group col-md-3">
        <label>Color</label>
        <input type="text" class="form-control" name="product_color" placeholder="Enter ...">
        
      </div>
      <div class="form-group col-md-3">
        <label for="img">Image</label>
        <input type="file" class="form-control input-file uniform-on" id="img" name="product_image">
      </div>
      <div class="form-group col-md-3">
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" type="checkbox" id="publication_status" name="publication_status" value="1">
          <label for="publication_status" class="custom-control-label">Publication Status</label>
        </div>
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Add product</button>
    </div>
  </form>
</div>

@endsection