@extends('admin_layout')
@section('admin_content')

<!-- general form elements -->
<div class="card card-light mt-3">
  <div class="card-header">
    <h3 class="card-title">slider</h3>


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
  <form enctype="multipart/form-data" method="post" action="{{url('/save-slider')}}" >
  	{{@csrf_field()}}
    <div class="card-body">

      
      <div class="form-group col-md-3">
        <label for="img">Image</label>
        <input type="file" class="form-control input-file uniform-on" id="img" name="slider_image">
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
      <button type="submit" class="btn btn-primary">Add slider</button>
    </div>
  </form>
</div>

@endsection