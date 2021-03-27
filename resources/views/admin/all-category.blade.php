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
        <th>Category ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($allcategory as $category)
      <tr>
        <td>{{$category->category_id}}</td>
        <td>{{$category->category_name}}</td>
        <td>{{$category->category_description}}</td>
        <td>
        	@if($category->publication_status==1)
        		<span class="badge badge-success">Active</span>
        	@else
        		<span class="badge badge-warning">Unactive</span>
        	@endif
        </td>

        <td class="center">
        	@if($category->publication_status==1)
	        	<a href="{{URL('/unactive-category/'.$category->category_id)}}" class="btn btn-warning">
	        		<i class="fas fa-thumbs-down"></i>
	        	</a>
	        @else
	        	<a href="{{URL('/active-category/'.$category->category_id)}}" class="btn btn-success">
	        		<i class="fas fa-thumbs-up"></i>
	        	</a>
	        @endif
        	<a href="{{URL('/edit-category/'.$category->category_id)}}" class="btn btn-info">
        		<i class="fas fa-edit"></i>
        	</a>
        	<a href="{{URL('/delete-category/'.$category->category_id)}}" id="catDelete" class="btn btn-danger">
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