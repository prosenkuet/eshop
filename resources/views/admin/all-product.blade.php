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
        <th>Product ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Long Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Color</th>
        <th>Size</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($allproduct as $product)
      <tr>
        <td>{{$product->product_id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->category_name}}</td>
        <td>{{$product->manufacture_name}}</td>
        <td>{{$product->product_long_description}}</td>
        <td>{{$product->product_price}}</td>
        <td><img src="{{$product->product_image}}" style="height: 80px; width: 100px"></td>
        <td>{{$product->product_color}}</td>
        <td>{{$product->product_size}}</td>
        <td>
        	@if($product->publication_status==1)
        		<span class="badge badge-success">Active</span>
        	@else
        		<span class="badge badge-warning">Unactive</span>
        	@endif
        </td>

        <td class="center">
        	@if($product->publication_status==1)
	        	<a href="{{URL('/unactive-product/'.$product->product_id)}}" class="btn btn-warning">
	        		<i class="fas fa-thumbs-down"></i>
	        	</a>
	        @else
	        	<a href="{{URL('/active-product/'.$product->product_id)}}" class="btn btn-success">
	        		<i class="fas fa-thumbs-up"></i>
	        	</a>
	        @endif
        	<a href="{{URL('/edit-product/'.$product->product_id)}}" class="btn btn-info">
        		<i class="fas fa-edit"></i>
        	</a>
        	<a href="{{URL('/delete-product/'.$product->product_id)}}" id="catDelete" class="btn btn-danger">
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