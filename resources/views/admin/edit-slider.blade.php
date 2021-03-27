@extends('admin_layout')
@section('admin_content')

<!-- general form elements -->
<div class="card card-light mt-3">
  <div class="card-header">
    <h3 class="card-title">Edit slider</h3>


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
  <form role="form" action="{{url('/update-slider/'.$slider_info->slider_id)}}" method="post">
  	{{@csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="slider_name" value="{{$slider_info->slider_name}}">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="3" name="slider_long_description" value="">{{$slider_info->slider_long_description}}</textarea>
      </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update slider</button>
    </div>
  </form>
</div>

@endsection