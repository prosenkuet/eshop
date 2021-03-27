@extends('admin_layout')
@section('admin_content')

<!-- general form elements -->
<div class="card card-light mt-3">
  <div class="card-header">
    <h3 class="card-title">Edit manufacture</h3>


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
  <form role="form" action="{{url('/update-manufacture/'.$manufacture_info->manufacture_id)}}" method="post">
  	{{@csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="manufacture_name" value="{{$manufacture_info->manufacture_name}}">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="3" name="manufacture_description" value="">{{$manufacture_info->manufacture_description}}</textarea>
      </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update manufacture</button>
    </div>
  </form>
</div>

@endsection