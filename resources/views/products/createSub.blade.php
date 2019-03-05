@extends('admin.main')

@section('title','| Sub category')

@section('content')
	<div class="main-content">
		<h1>Add Sub Category to {{ $category->name }}</h1>

			{{ Form::open(['route' => 'products.subcategorystore']) }}
		<div class="row">
		<div class="col-md-6">

			{{ Form::label('category','Category:',['class' => 'form-spacing-top']) }}
			{{ Form::text('category',$category->name,['class' => 'form-control','disabled' => '']) }}
			<input type="hidden" name="category_id" value="{{ $category->id}}">
		</div>
		<div class="col-md-6"> 

			{{ Form::label('subcategory','Sub Category Name: ',['class' => 'form-spacing-top']) }}
			{{ Form::text('subcategory',null,['class' => 'form-control']) }}
		</div>
	    </div>
		<div class="row">
			<a href="{{ route('prodcategories.index') }}" class="btn btn-danger btn-md pull-left form-spacing-top">Cancel</a>
			{{ Form::submit('Add subcategory',['class' => 'btn btn-md btn-success pull-right form-spacing-top']) }}
		</div>

			{{ Form::close() }}
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2 class="text-center text-primary">Other Sub Categories of {{ $category->name }}</h2>
				@if($category->prodSubcategories()->count() == 0)

				<p class="text-danger text-center"><i>Their are no other subcategories to this item</i></p>

				@else
				<table class="table">
					<thead>
						<th>#</th>
						<th>Name</th>
					</thead>
					<tbody>
						<?php $i = 1;  ?>
						@foreach($category->prodSubcategories as $subcategory)
						<tr>
							<td>{{ $i }}</td>
							<td>{{$subcategory->name}} </td>
						</tr>
						<?php $i++; ?>
						@endforeach
					</tbody>
				</table>

				@endif
			</div>
		</div>
		</div>
	

@endsection