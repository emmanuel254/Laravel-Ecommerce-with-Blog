@extends('main')

@section('title','| '.$product->title)

@section('content')


                            <?php 
                                $cprice = $product->price;
                                $oprice = $product->list_price;

                                $offers = $oprice - $cprice;
                                $offer = $offers/100;
                            ?>          

<!-- for-mobile-apps -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<!-- //js -->
 <script src='{{ asset('js/okzoom.js') }}'></script>
  <script>
    $(function(){
      $('#example').okzoom({
        width: 250,
        height: 250,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });
  </script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
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
    
<body>
<!-- banner -->
    <div class="banner">
        <div class="w3l_banner_nav_left">
        
        </div>
        <div class="w3l_banner_nav_right">
            <div class="agileinfo_single">
                <h5>{{ $product->title }}</h5>
                    <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>OFF BY</span>
                                        <span class="sale">{{ $offer }} %</span>
                                    </div>
                                </div>
                </div>



                <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="{{ asset('products/'.$product->image) }}" alt="{{ $product->title }} " class="img-responsive" width="300px" height="100%" />

                                <div class="product-btn form-spacing-top" style="margin-bottom: 4px;">
                                        <button class="main-btn icon-btn pull-right"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                       
                                    </div>
                                <form method="POST" action="{{ url('add_cart') }}">
                                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                                   <input type="hidden" name="image" value="{{ $product->image }}">

                                   <input type="number" min="1" name="quantity" class="form-control" style="width: 100%" placeholder="Quantity">
                                 <button type="submit" class="primary-btn add-to-cart" style="margin-top: 12px; width: 100%"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>

                               </form>
                                    
                </div>
                <div class="col-md-8 agileinfo_single_right" style="margin-top: 0px;">
                    
                        
                             <div class="product-body">
                                <h3 class="product-price">Ksh {{ $product->price }} 
                                <del class="product-old-price text-danger">Ksh {{ $product->list_price }}</del></h3>
                            </div>

                    <div class="rating1">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" checked>
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                    </div>

                    <div class="w3agile_description">
                            
                            
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab1">Details</a></li>
                                <li><a data-toggle="tab" href="#tab2">Reviews ({{ $reviews->count() }})</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">

                                                @if($reviews->count() != 0)

                                                @foreach($reviews as $review)

                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> {{ $review->name }}</a></div>

                                                        <div style="font-size: 13px"><a href="#"><i class="fa fa-clock-o"></i> {{ date('M j,Y',strtotime($review->created_at)) }} / 
                                                        {{ date('h:i a',strtotime($review->created_at)) }}</a></div>
                                                        <div class="review-rating pull-right">

                                                    @for($i = 1; $i <= 5; $i++)

                                                    <i class="fa fa-star<?=($i>$review->Ratings)?'-o empty':'';?>"></i> 
                                                         
                                                    @endfor

                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{ $review->Review }}</p>
                                                    </div>
                                                </div>
                                                
                                                @endforeach

                                                <ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>

                                                @else

                                                <p class="text-danger text-center">This Product has no reviews yet. Please Review it</p>

                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Write Your Review</h4>
                                            <p>Your email address will not be published.</p>
                                            <form method="POST" action="{{ route('reviews.store') }}" class="review-form">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="form-group">
                                                    <input class="input" type="text" name="name" placeholder="Your Name" required="" />
                                                </div>

                                                <div class="form-group">
                                                <input class="input" type="email" name="email" placeholder="Email Address" required="" />
                                                </div>

                                                <div class="form-group">
                                                    <textarea class="input" name="review" placeholder="Your review" required=""></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">Your Rating: </strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="Submit" value="Submit" class="primary-btn">
                                            </form>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                 
                    {{-- end --}}
                    </div>
                    
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- //banner -->

 <!-- /row -->  
            <div class="row">
                <h2 class="text-left form-spacing-top"><i>Related Products</i></h2>
                @foreach($category->products as $product)
                <!-- Product Single -->
                <div class="col-md-2 col-sm-6 col-xs-6" style="font-size: 15px">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <form action="{{ route('products.single',$product->id) }}">
                                    <input type="hidden" name="category" value="{{$product->category}}">
                                  
                                    <input type="submit" class="main-btn quick-view" value="View ">
                              
                                     </form>
                            <img src="{{ asset('products/'.$product->image) }}" alt="" height="100%" width="100%">
                        </div>
                        <div class="product-body">
                            <h4 class="product-price">Ksh.{{ $product->price }}</h4>
                            <p class="text-danger"><s>Ksh.{{ $product->list_price }}</s></p>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">{{ $product->title }}</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="primary-btn add-to-cart pull-right"><i class="fa fa-shopping-cart"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                @endforeach

        </div>
        

@endsection