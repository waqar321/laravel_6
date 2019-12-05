@extends('layouts.adminLayout.admin_design')
@Section('content')

<div id="content">
  <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">View Product</a> </div>
    <h1>Product</h1>
    @if(Session::has('status'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('status') !!}</strong>
            </div>
      @endif   
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Product</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <th>Product description</th>
                  <th>Product Price</th>
                  <th>Product Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach($products as $Product)
                <tr class="gradeX">
                  <td class="center">{{ $Product->id }}</td>
                  <td class="center">{{ $Product->category_id }}</td>
                  <td class="center">{{ $Product->category_name }}</td>
                  <td class="center">{{ $Product->product_name }}</td>
                  <td class="center">{{ $Product->product_code }}</td>
                  <td class="center">{{ $Product->product_color }}</td>
                  <td class="center">{{ $Product->description }}</td>
                  <td class="center">{{ $Product->price }}</td>
                  <td class="center">
                  	@if(!empty($Product->image))
                  		 <img src="{{ URL('/images/backend_images/products/small/'.$Product->image) }}" style="width:50px;">
                    @endif 
                  </td>
                  
                    <td class="center">
                        <a href="#myModal{{ $Product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                        <a href="{{ url('admin/add-attribute/'.$Product->id) }}" class="btn btn-success btn-mini">Add</a>
                        <a id="delProduct123" href="{{ url('admin/edit-products/'.$Product->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                         <a id="delProduct" href="{{ url('admin/delete-products/'.$Product->id) }}" class="btn btn-danger btn-mini deleteRecord">Delete</a> 
                     </td>
                  </td>
                </tr>
                    <div id="myModal{{ $Product->id }}" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>{{ $Product->product_name }} Full Detail </h3>
                      </div>
                      <div class="modal-body">
                        <p>Product ID:  {{ $Product->id }} </p>
                        <p>Product Category Name:  {{ $Product->category_name }} </p>
                        <p>Product Name:  {{ $Product->product_name }} </p>
                        <p>Product Code:  {{ $Product->product_code }} </p>
                        <p>Product Color:  {{ $Product->product_color }} </p>
                        <p>Product Description:  {{ $Product->description }} </p>
                        <p>Product Price:  {{ $Product->price }} </p>
                      </div>
                    </div>
                @endforeach
           
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- pop work -->
              <div class="widget-content"> 

              </div>

@endsection