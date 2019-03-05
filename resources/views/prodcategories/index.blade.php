@extends('admin.main')

@section('title','| All categories')

@section('stylesheets_admin')
  <link href="{{ asset('css/style2.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
	<div class="main-content">
		<h2 class="text-center form-spacing-top">ALL CATEGORIES</h2>
		<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_right">
			<div class="row">
				@foreach($categories as $category)
					<div class="col-md-4">
						 <div class="w3l_banner_nav_right_banner3_btm" style="clear: both;">
				    		<div class="w3l_banner_nav_right_banner3_btml">
							<div class="view view-tenth">
								@if($category->image != '')
								<img src="{{ asset('products/categories/'.$category->image) }}" alt=" " width="300x" height="350px" />
								@else
								<img src="{{ asset('images/13.jpg') }}" alt=" " width="300x" height="350px"/>
								@endif
							 <div class="mask">
								<h4>{{$category->name}}</h4>
								<h5 class="bg-success">Sub Categories</h5>
								<ul>
									@foreach($category->ProdSubCategories as $subcategory)
									  <li style="color: white;">{{$subcategory->name}}</li>
									@endforeach
								</ul>
							 </div>
					     </div>
					<h4>{{ $category->name }}</h4>
					<p class="text-center">{{$category->description}}</p>
				</div>
			    </div>
			    <div class="row">
			    	
			    	<div class="col-md-12 col-md-offset-3">
			    		<div class="btn-group" role="group">
			    			<a href="{{ route('products.subcategory',$category->id) }}" class="btn btn-sm btn-primary">
			    				<i class="fa fa-plus"> add Subcategory</i></a>

                                <a href="{{ route('prodcategories.edit',$category->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"> Edit</i></a> 
                                </div>
			    				
			    	</div>
			    </div>
			   </div>
			   
			   @endforeach
			   <div class="clearfix"> </div>
			
			</div>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-6">
			<a href="{{ route('prodcategories.create') }}" class="btn btn-primary btn-sm">Add Category</a>
		</div>
		
	</div>
			
@endsection

