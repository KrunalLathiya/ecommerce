<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Categories</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::url() == url('admin/categories/add')) active @endif"><a href="{{action('CategoryController@create')}}"><i class="fa fa-circle-o"></i>Add Category</a></li>
                    <li class="@if(Request::url() == url('admin/categories/index')) active @endif"><a href="{{action('CategoryController@index')}}"><i class="fa fa-circle-o"></i>All Categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Sub Categories</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::url() == url('admin/subcategories/add')) active @endif"><a href="{{action('SubCategoryController@create')}}"><i class="fa fa-circle-o"></i>Add SubCategory</a></li>
                    <li class="@if(Request::url() == url('admin/subcategories/index')) active @endif"><a href="{{action('SubCategoryController@index')}}"><i class="fa fa-circle-o"></i>All SubCategories</a></li>
                </ul>
            </li> 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Products</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::url() == url('admin/products/add')) active @endif"><a href="{{action('ProductController@create')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
                    <li class="@if(Request::url() == url('admin/products/index')) active @endif"><a href="{{action('ProductController@index')}}"><i class="fa fa-circle-o"></i>All Products</a></li>
                </ul>
            </li> 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Page Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::url() == url('admin/pagesettings/add')) active @endif"><a href="{{action('PageController@create')}}"><i class="fa fa-circle-o"></i>Add New Page</a></li>
                    <li class="@if(Request::url() == url('admin/pagesettings/index')) active @endif"><a href="{{action('PageController@index')}}"><i class="fa fa-circle-o"></i>All Pages</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Add Home Top Footer</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::url() == url('admin/footerhead/add')) active @endif"><a href="{{action('FooterHeadController@create')}}"><i class="fa fa-circle-o"></i>Add New Content</a></li>
                    <li class="@if(Request::url() == url('admin/footerhead/index')) active @endif"><a href="{{action('FooterHeadController@index')}}"><i class="fa fa-circle-o"></i>All Content</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Add Footer Menu</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::url() == url('admin/footertail/add')) active @endif"><a href="{{action('FooterTailController@create')}}"><i class="fa fa-circle-o"></i>Add New Menu</a></li>
                    <li class="@if(Request::url() == url('admin/footertail/index')) active @endif"><a href="{{action('FooterTailController@index')}}"><i class="fa fa-circle-o"></i>All Footer Menu</a></li>
                </ul>
            </li>
            <li>
                <a href="{{action('HeaderTopController@create')}}">
                    <i class="fa fa-dashboard"></i>Edit Top
                </a>
            </li> 
        </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/adminlte.min.js')}}"></script>