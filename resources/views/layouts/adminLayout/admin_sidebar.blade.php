<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{URL('admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ URL('admin/add-category') }}">Add Categories</a></li>
        <li><a href="{{ URL('admin/view-category') }}">View Categories</a></li>

      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ URL('admin/add-products') }}">Add Products</a></li>
        <li><a href="{{ URL('admin/view-products') }}">View Products</a></li>

      </ul>
    </li>
    <
  </ul>
</div>