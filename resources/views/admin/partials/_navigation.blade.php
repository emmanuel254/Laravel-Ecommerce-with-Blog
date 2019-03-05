 <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse " style="background-color: black">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{ asset('images/12.png') }}" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a class="active" href="index.html">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Our Products</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('product.index') }}">View All</a></li>
              <li><a href="{{ route('products.create') }}">Add Product</a></li>
              <li><a href="panels.html">Out of Stock</a></li>
              <li><a href="{{ route('main_categories.index') }}">Main Categories</a></li>
              <li><a href="{{ route('prodcategories.index') }}">Product Categories</a></li>
            </ul>
          </li>
      
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>Users</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('home.blog_manager') }}">Blog Managers</a></li>
              <li><a href="{{ route('home.product_manager') }}">Products Manager</a></li>
              <li><a href="{{ route('home.editors') }}">Editors</a></li>
              <li><a href="{{ route('home.admin') }}">Admin</a></li>
              <li><a href="{{ route('home.index') }}">All Users</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Blog Manager</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('posts.index') }}">Posts</a></li>
              <li><a href="{{ route('categories.index') }}">Categories</a></li>
              <li><a href="{{ route('tags.index') }}">Tags</a></li>
            </ul>
          </li>
          <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li>
    
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Blog</a></li>
              <li><a href="chat_room.html"> Private Messages</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Settings</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>
          </li>

          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->