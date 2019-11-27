@extends('layouts.adminLayout.admin_design')
@Section('content')

<div id="content">
  <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categries</a> <a href="#" class="current">View Categries</a> </div>
    <h1>Categries</h1>
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
            <h5>View Categries</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Category Level</th>
                  <th>Status</th>
                  <th>Category URL</th>
                  <th>Action</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach($categories as $category)
                <tr class="gradeX">
                  <td class="center">{{ $category->id }}</td>
                  <td class="center">{{ $category->name }}</td>
                    @if ($category->parent_id === 0)
                        <td class="center">Category</td>
                    @else
                        <td class="center">Sub Category</td>
                    @endif
                  <td class="center">{{ $category->status }}</td>
                  <td class="center">{{ $category->url }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a id="delCat" href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-mini deleteRecord">Delete</a> </td>
                  </td>
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection