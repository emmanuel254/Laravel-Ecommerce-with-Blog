

{{-- single.blade.php --}}
@extends('main')

@section('title','| '.$category->name)

@section('content')

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title text-center">{{ $category->name }}</h2>
                    </div>
                </div>
                <!-- section title -->
				
				@foreach($category->products as $product)
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
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
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                @endforeach

               
            </div>
            <!-- /row -->

@endsection