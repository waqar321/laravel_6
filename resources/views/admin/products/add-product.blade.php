@extends('layouts.adminLayout.admin_design')

@Section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">Add Product</a> </div>
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
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-products') }}" name="add_product" id="add_product" novalidate="novalidate">
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
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div>       
			  <div class="control-group">
                <label class="control-label">product Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code">
                </div>
              </div>        
			  <div class="control-group">
                <label class="control-label">product Color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color">
                </div>
              </div>        

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description"> </textarea> 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">product Price</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price">
                </div>
              </div>  
			  <div class="control-group">
                <label class="control-label">product Image</label>
                <div class="controls">
                  <input type="file" name="product_image" id="product_iamge">
                </div>
              </div>   
                   	
              
              <div class="form-actions">
                <input type="submit" value="Add product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection