@extends('admin.main')

@section('title','| ALL PRODUCTS')

@section('content')

	<div class="main-content">
		<div class="row">
		<div class="col-md-12">

		
              <div class="btn-grou">
                <button type="button" class="btn btn-theme03" href="#">Show All Products</button>
                <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
                	 Filter By Category
                  <span class="caret"></span>   
                  </button>
                <ul class="dropdown-menu" role="menu">

                	@foreach($categ as $main_category)

	                  <li><a href="{{ url('product?category='.$main_category->id) }}">{{ $main_category->name }}</a></li>

                   @endforeach

                </ul>
              </div>
	
			<h1 class="text-center">OUR PRODUCT STORE</h1>
			
			@foreach($products as $product)
			<div class="col-md-4">
				<h1>{{ $product->title }}</h1>
				<img src="{{ asset('products/'.$product->image) }}" width="300px" height="171px">
				<p>Category:</p>
				<p>Subcategory</p>
				<p><i><b>Price: </b></i>KSH {{ $product->price }}</p>
				<p><i><b>List Price: </b></i>KSH {{ $product->list_price }}</p>
				<a href="#" class="btn btn-xs btn-primary pull-left">View</a>
				<a href="{{ route('products.edit',$product->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>
			</div>
			@endforeach
			
		</div>
	</div>
	</div>

@endsection