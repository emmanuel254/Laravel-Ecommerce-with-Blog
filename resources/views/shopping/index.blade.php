@extends('main')

@section('title','| all Products')

@section('content')

	  <!-- row -->
            <div class="row">
            	<h2 class="text-center">ALL PRODUCTS</h2>
				
				@foreach($products as $product)
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                             <form action="{{ route('products.single',$product->id) }}">
                                <input type="hidden" name="category" value="{{$product->category}}">
                              
                                <input type="submit" class="main-btn quick-view" value="View">
                      
                             </form>
                        
                            <img src="{{ asset('products/'.$product->image) }}" alt="" height="250px" width="353px">
                        </div>
                        <div class="product-body">
                            <h2 class="product-price">Ksh.{{ $product->price }}</h2>
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
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart."></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                @endforeach

               
            </div>
            <!-- /row -->
@endsection