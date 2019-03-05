<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- header -->
    <div class="agileits_header">

<!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="containe">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav show-on-click">
                    <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">

                        @foreach($main as $main_category)

                        @if($main_category->prodcategories()->count() != 0)

                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ $main_category->name }}

                                <i class="fa fa-angle-right"></i></a>
                                 <div class="custom-menu">
                                  <div class="row">

                                    @foreach($main_category->prodcategories as $categ)

                                    <div class="col-md-4">
                                        <ul class="list-links">

                                            <li><h3 class="list-links-title">{{ $categ->name }}</h3></li>
                                            
                                            @foreach($categ->prodsubcategories as $subcategory)
                                            
                                                <li><a href="{{ url('main_category/'.$main_category->id.'?subcategory='.$subcategory->id) }}">{{ $subcategory->name }}</a></li>
                                                
                                            @endforeach

                                          </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>

                                    @endforeach
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner1 banner-1" href="{{ url('main_category/'.$main_category->id) }}"> 
                                            <img src="{{ asset('products/categories/'.$main_category->image) }}" alt="">
                                            <div class="banner-caption text-center">
                                                <h2 style="text-transform: uppercase;" class="white-color">
                                                    {{ $main_category->name }}</h2>
                                                <h3 class="white-color font-weak">NEW ARRIVALS</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endif

                        @endforeach

                        @foreach($main as $main_categ)

                            @if($main_categ->prodcategories()->count() == 0)
                        
                                <li><a href="{{ url('main_category/'.$main_categ->id) }}">{{ $main_categ->name }}</a></li>                                
                            @endif

                        @endforeach

                        <li><a href="#">View All</a></li>

                    </ul>
                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav container">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="/" class="{{ Request::is('/') ? "actives active" : ""}}">Home</a></li>
                        <li><a href="{{ route('shopping.index') }}">Shoping Site</a></li>
                       
                        <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">All Products <i class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    
                                    @foreach($categories as $category)
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="{{ route('categories',$category->id) }}">
                                                <img src="{{ asset('products/categories/'.$category->image)}}" alt="" width="500px" height="141px">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">{{$category->name}}</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            @foreach($category->ProdSubCategories as $subcategory)
                                            <li><a href="{{ url('subcategory/'.$subcategory->id) }}">{{$subcategory->name}}</a></li>
                                            
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    @endforeach

                                    <div style="margin-left: 0px;">
                                         {!! $categories->links() !!}
                                    </div>
                                     
                                </div>
                            </div>
                        </li>
                        <li><a href="/blog" class="{{ Request::is('blog') ? "actives" : ""}}">Blog</a></li>
                        <li><a href="/contact" class="{{ Request::is('contact') ? "actives" : ""}}">Contact</a></li>
                        <li><a href="/about" class="{{ Request::is('about') ? "actives active" : ""}}">About</a></li>
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('chat.index') }}">Speak With a Doctor</a></li>
                                <li><a href="{{ route('questions') }}">Ask a Question</a></li>
                                <li><a href="{{ route('shopping.index') }}">Products</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </li>

                      @if(Auth::check())

                            <li class="dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Hello  <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                              <li style="font-size: 15px;"> {{ Auth::user()->name }}</li><hr>
                              <li><a class="dropdown-item" href="{{ route('posts.index')}}">Posts</a></li>
                              <li><a href="{{ route('categories.index') }}" class="dropdown-item">Categories</a></li>
                              <li><a href="{{ route('tags.index') }}" class="dropdown-item">Tags</a></li>
                              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                </a></li>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                           </ul>
                          </li>

                      @else
                      <a href="{{ route('login') }}" class="btn btn-xs btn-info">Login</a>

                      @endif

          </ul>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->


<div class="w3l_offers" style="max-height: 50px;">
            <a href="{{ url('/') }}">HEALTHY LIVING SHOP</a>
        </div>
        <div class="w3l_search form-group">
            <form action="#" method="post">
                <input type="text" name="search" id="search" placeholder="Search a product..."onblur="if (this.placeholder == '') {this.placeholder = 'Search a product...';}" required="">
                <input type="submit" value=" ">

            </form>

            <div class="text-center" id="product_list"></div>

        </div>

          <div class="product_list_header2 "  style="margin-left: 0px;margin-top: -4px;">  
             <div class="header_icons ">
                    
                    <div class="header-wrapicon2" >
                        <div class="">
                    <ul class="header-btn">

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-bt"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>

                        </div>
                </div>
        </div>       

        <div class="product_list_header">  
             <div class="header_icons ">

                    <span class="linedivide1"></span>
                    
                    <div class="header-wrapicon2" >
                        <img src="{{ asset('images/cart.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti" style="color: white">{{ count($cart) }}</span>

                            <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">

                                @foreach($cart as $item)

                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="{{ asset('products/'.$product->find($item->id)->image) }}" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            {{ $item->name }}
                                        </a>

                                        <span class="header-cart-item-info">
                                            {{ $item->qty }} x KSH {{ $item->price }}
                                        </span>
                                    </div>

                                </li>

                                @endforeach

                            </ul>

                            <div class="header-cart-total">
                                Total: Ksh. {{ Cart::total() }}
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{ url('cart') }}" class="flex-c-m size1 bg4 bo-rad-5 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{ url('cart') }}" class="flex-c-m size1 bg4 bo-rad-5 hov1 s-text1 trans-0-4">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                        </div>

                        </div>
                </div>
        </div>
   
          <div class="product_list_header   ">
                    <div class="pull-right" style="margin-top: -5px;">
                            <ul class="header-btns">
                                <!-- Account -->
                                <li class="header-account dropdown default-dropdown">
                                    <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                        <div class="header-btns-icon">
                                            <i class="fa fa-user-o"></i>
                                        </div>
                                    </div>

                                    <ul class="custom-menu">
                                        <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                                        <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                                        <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                                        <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                                        <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    
                </div> 
        

            
        <div class="w3l_header_right1">
            <h2><a href="mail.html">HOT DEALS!</a></h2>
        </div>
        <div class="clearfix"> </div>
    </div>
<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
         var navoffeset=$(".agileits_header").offset().top;
         $(window).scroll(function(){
            var scrollpos=$(window).scrollTop(); 
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
         });
         
    });
    </script>
<!-- //script-for sticky-nav -->
    <div class="logo_products">
    
<!-- //header -->


</div>

<!-- Header Icon -->

                        <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="login.html">Login</a></li> 
                                <li><a href="login.html">Sign Up</a></li>
                            </ul>
                        </div>                  
                    </div>  
                </li>
            </ul>    <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="login.html">Login</a></li> 
                                <li><a href="login.html">Sign Up</a></li>
                            </ul>
                        </div>                  
                    </div>  
                </li>
            </ul>
          

<script>
    
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var value = $(this).val();
            if (value != '') 
            {
                $.ajax({

                    type: 'get',

                    url : '{{URL::to('search')}}',

                    data:{'search':value},

                    success:function(data){
                    $('#product_list').fadeIn();
                    $('#product_list').html(data);

                    }
                })
            }
        });

        $(document).on('click','li',function(){
            $('#search').val($(this).text());
            $('#product_list').fadeOut();
        });

    });
</script>

<script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>


   