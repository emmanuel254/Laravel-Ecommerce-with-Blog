 @extends('main')

@section('title','| Home Page')

@section('content')

<!-- start-smoth-scrolling -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
</head>



    <div class="banner">
        <div class="w3l_banner_nav_right">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="w3l_banner_nav_right_banner">
                                <h3>Make your <span>food</span> with Spicy.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3l_banner_nav_right_banner1">
                                <h3>Make your <span>food</span> with Spicy.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3l_banner_nav_right_banner2">
                                <h3>upto <i>50%</i> off.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- flexSlider -->
                <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
                <script defer src="js/jquery.flexslider.js"></script>
                <script type="text/javascript">
                $(window).load(function(){
                  $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                      $('body').removeClass('loading');
                    }
                  });
                });
              </script>
            <!-- //flexSlider -->
        </div>
        <div class="clearfix"></div>
    </div>

  <!-- section -->
    <div class="section">
        <!-- container -->
            <!-- row -->

            <div class="row">
                <!-- banner -->

                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">NEW ARRIVALS !!</h2>
                    </div>
                </div>

                @foreach($newArrivals as $newArrival)

                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="{{ url('main_category/'.$newArrival->id) }}">
                        <img src="{{ asset('/products/categories/'.$newArrival->image) }}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">{{ $newArrival->name }}</h2>
                        </div>
                    </a>
                </div>

                @endforeach
                <!-- /banner -->

            </div>
            <!-- /row -->
    </div>
    <!-- /section -->


        <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Deals Of The Day</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

               

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            @foreach($products as $product)
                                
                            <?php 
                                $cprice = $product->price;
                                $oprice = $product->list_price;

                                $offers = $oprice - $cprice;
                                $offer = $offers/100;
                            ?>
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>OFF BY</span>
                                        <span class="sale">{{ $offer }} %</span>
                                    </div>
                                    <form action="{{ route('products.single',$product->id) }}">
                                    <input type="hidden" name="category" value="{{$product->category}}">
                                  
                                    <input type="submit" class="main-btn quick-view" value="View "><i class="fa fa-search-plus"></i>
                              
                                     </form>
                                    <img src="{{ asset('products/'.$product->image) }}" alt="" height="200px" width="323px">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">Ksh {{ $product->price }} 
                                    <del class="product-old-price">Ksh {{ $product->list_price }}</del></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">{{ $product->title }}</a></h2>
                                    <div class="product-btns">

                                         <form method="POST" action="{{ url('add_cart') }}">

                                          <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                          <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>

                                           <input type="hidden" name="product_id" value="{{ $product->id }}">
                                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                                           <input type="hidden" name="image" value="{{ $product->image }}">
                                           <input type="hidden" value ="1" name="quantity">
                                           <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> ADD ITEM</button>

                                       </form>
                                      
                                    </div>
                                </div>
                           
                            </div>
                            @endforeach
                            <!-- /Product Single -->
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->


        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
      @include('pages.extra_pages.featured_products')
@endsection