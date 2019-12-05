@extends('layouts/frontLayout/front_design')

@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            
                            <!-- ========================================================================  -->
                            @foreach($Categories as $cat)
                             @if($cat->status == "1")
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                           {{ $cat->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{ $cat->id }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                             @foreach($cat->categories as $sub_cat)
                                                 @if($sub_cat->status == "1")
                                                     <li><a href="{{ URL('products/'.$sub_cat->url) }}"> {{ $sub_cat->name }} </a></li>
                                                  @endif
                                             @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             @endif
                            @endforeach
                        <!-- ========================================================================  -->
                         </div><!--/category-products-->
                     </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center"> {{ $categoryDetails->name }} </h2>
                        
                        @foreach($productsAll as $products)
                          
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ URL('images/backend_images/products/small/'.$products->image)}}" alt="" />
                                                <h2>Rs{{ $products->price }}</h2>
                                                <p>{{ $products->product_name }}</p>
                                                <a href="{{ URL('product/'.$products->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            <!-- havor alternate slider -->
                                            <!-- <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div> -->
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                      
                    </div><!--features_items-->            
                </div>
            </div>
        </div>
    </section>

@endsection