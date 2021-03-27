@extends('admin_layout')
@section('admin_content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">DataTable with default features</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Slider ID</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($allslider as $slider)
      <tr>
        <td>{{$slider->slider_id}}</td>
        <td><img src="{{$slider->slider_image}}" style="height: 80px; width: 100px"></td>
        <td>
        	@if($slider->publication_status==1)
        		<span class="badge badge-success">Active</span>
        	@else
        		<span class="badge badge-warning">Unactive</span>
        	@endif
        </td>

        <td class="center">
        	@if($slider->publication_status==1)
	        	<a href="{{URL('/unactive-slider/'.$slider->slider_id)}}" class="btn btn-warning">
	        		<i class="fas fa-thumbs-down"></i>
	        	</a>
	        @else
	        	<a href="{{URL('/active-slider/'.$slider->slider_id)}}" class="btn btn-success">
	        		<i class="fas fa-thumbs-up"></i>
	        	</a>
	        @endif
        	<a href="{{URL('/edit-slider/'.$slider->slider_id)}}" class="btn btn-info">
        		<i class="fas fa-edit"></i>
        	</a>
        	<a href="{{URL('/delete-slider/'.$slider->slider_id)}}" id="catDelete" class="btn btn-danger">
        		<i class="fas fa-trash-alt"></i>
        	</a>
        </td>
      </tr>
      @endforeach
      
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<script>

</script>
@endsection