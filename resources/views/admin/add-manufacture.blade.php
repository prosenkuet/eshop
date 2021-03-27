@extends('admin_layout')
@section('admin_content')

<!-- general form elements -->
<div class="card card-light mt-3">
  <div class="card-header">
    <h3 class="card-title">Manufacture</h3>


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
  <form role="form" action="{{url('/save-manufacture')}}" method="post">
  	{{@csrf_field()}}
    <div class="card-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="manufacture_name" placeholder="Enter ...">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="3" name="manufacture_description" placeholder="Enter ..."></textarea>
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" type="checkbox" id="publication_status" name="publication_status" value="1">
          <label for="publication_status" class="custom-control-label">Publication Status</label>
        </div>
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Add Manufacture</button>
    </div>
  </form>
</div>

@endsection