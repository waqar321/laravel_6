@extends('layouts.adminLayout.admin_design')

@Section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">Edit Product</a> </div>
    <h1>Add Product</h1>
     @if(Session::has('status'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('status') !!}</strong>
            </div>
      @endif   
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">			 
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-products/'.$productDetail->id) }}" name="edit_product" id="edit_product" novalidate="novalidate">
              {{ csrf_field() }}
        	<div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                  <select name="category_id" style="width: 220px;"> 
                     <?php  echo $categories_drop_down; ?>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{ $productDetail->product_name }}">
                </div>
              </div>       
			  <div class="control-group">
                <label class="control-label">product Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" value="{{ $productDetail->product_code }}">
                </div>
              </div>        
			  <div class="control-group">
                <label class="control-label">product Color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" value="{{ $productDetail->product_color }}">
                </div>
              </div>        

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" > {{ $productDetail->description }}</textarea> 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">product Price</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price" value="{{ $productDetail->price }}">
                </div>
              </div>  
			  <div class="control-group">
                <label class="control-label">product Image</label>
                <div class="controls">
                  <input type="file" name="product_image" id="product_image">
                  <input type="hidden" name="current_image" id="current_image" value="{{$productDetail->image}}">
                  @if(!empty($productDetail->image))
                  <img style="width: 30px;" src="{{ URL('images/backend_images/products/small/'.$productDetail->image) }}">
                  <a id="delProduct" href="{{ URL('admin/delete-productsImage/'.$productDetail->id) }}">Delete </a>
                @endif
                </div>
              </div>   
                   	
              
              <div class="form-actions">
                <input type="submit" value="Edit product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection