@extends('layouts.adminLayout.admin_design')

@Section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Add Product Attributes</a> <a href="#" class="current">Add Product Attributes</a> </div>
    <h1>Add Product Attributes</h1>
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
            <h5>Add Product Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-attribute/'.$productDetail->id) }}" name="add_product_attribute" id="add_product_attribute" novalidate="novalidate">
              {{ csrf_field() }}
 
              <input type="hidden" name="productID"  value="{{$productDetail->id}}">
              <div class="control-group">
                <label class="control-label">product Name</label>
                <label class="control-label">{{ $productDetail->product_name}}</label>
                
              </div>       
			  <div class="control-group">
                <label class="control-label">product Code</label>
                <label class="control-label">{{ $productDetail->product_code}}</label>
                
              </div>        
			  <div class="control-group">
                <label class="control-label">product Color</label>
                <label class="control-label">{{ $productDetail->product_color}}</label>
              </div>        
  
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls field_wrapper">
                  <input required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;">
                  <input required title="Required" type="text" name="size[]" id="size" placeholder="Size" style="width:120px;">
                  <input required title="Required" type="text" name="price[]" id="price" placeholder="Price" style="width:120px;"> 
                  <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;">
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

        <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{ url('admin/edit-attributes/'.$productDetail->id) }}" method="post">{{ csrf_field() }}
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php /*echo "<pre>"; print_r($productDetail->attributes); die;*/ ?>
                  @foreach($productDetail->attributes as $attribute)
                  <tr class="gradeX">
                    <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                    <td class="center">{{ $attribute->sku }}</td>
                    <td class="center">{{ $attribute->size }}</td>
                    <td class="center"><input name="price[]" type="text" value="{{ $attribute->price }}" /></td>
                    <td class="center"><input name="stock[]" type="text" value="{{ $attribute->stock }}" required /></td> 
                    <td class="center">
                      <input type="submit" value="Update" class="btn btn-primary btn-mini" />
                      <?php /* <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a> */ ?>
                      <a href="{{ url('admin/delete-attribute/'.$attribute->id) }}" class="btn btn-danger btn-mini">Delete</a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection