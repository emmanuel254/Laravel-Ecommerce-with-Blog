@extends('admin.main')

@section('title','| Add Product')

@section('stylesheets_admin')
   <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script>
     tinymce.init({
      selector: "textarea",  // change this value according to your HTML
      plugins: "lists link",
      menubar: "numlist bullist"
    });
   </script>

@endsection

@section('content')
	<div class="main-content">
	<h1 class="text-center">ADD A NEW PRODUCT</h1>
	<img src="{{ asset('images/12.jpg') }}" width="100%">

	{{ Form::open(['route' => 'products.store_item','files' => true]) }}
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('title','Title:',['class' => ''.$errors->has('title') ? ' is-invalid form-spacing-top' : 'form-spacing-top']) }}
			{{ Form::text('title',null,['class' => 'form-control']) }}	
			
			    @if ($errors->has('title'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
		</div>

		<div class="col-md-3">

			{{ Form::label('main_category','Main Category:',['class' => 'form-spacing-top']) }}
			<select class="form-control dynamic_one" name="main_category" id="main_category" data-dependent="category" >
				<option value=""></option>
				@foreach($maincateg as $main_category)
					<option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
				@endforeach

			</select>	
		</div>

		<div class="col-md-3">

			{{ Form::label('category','Category:',['class' => 'form-spacing-top']) }}
			<select class="form-control dynamic" name="category" id="category" data-dependent="brand" >

			</select>	
		</div>
	</div>

		<div class="row">
		<div class="col-md-6">

			{{ Form::label('brand','Brand:',['class' => 'form-spacing-top']) }}
			<select class="form-control" name="brand" id="brand">
			</select>
			
		</div>
		<div class="col-md-3">
			
			{{ Form::label('price','Price:',['class' => 'form-spacing-top']) }}
			{{ Form::number('price',null,['class' => 'form-control']) }}	
		</div>
		<div class="col-md-3">
			
			{{ Form::label('list_price','List Price:',['class' => 'form-spacing-top']) }}
			{{ Form::number('list_price',null,['class' => 'form-control']) }}	
		</div>
		</div>
		<div class="row form-spacing-top">
			<div class="col-md-12">

						<div class="col-md-3">
							 {{ Form::label('image_upload','Upload Image') }}
						</div>

						 <div class="fileupload fileupload-new" data-provides="fileupload">

						<div class="col-md-6">
							<div class="fileupload-new thumbnail" style="width: 400px; height: 250px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" name="image" alt="" />
                       </div>
                       <div class="fileupload-preview fileupload-exists thumbnail" name="image" style="max-width: 400px; max-height: 250px; line-height: 20px;"></div>
						</div>

						<div class="col-md-3">
							 <div style="margin-top: 10px;">
		                        <span class="btn btn-theme02 btn-file">
		                          <span class="fileupload-new"><i class="fa fa-paperclip" name="image"></i> Select image</span>
		                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
		                        <input type="file" class="default" name="image" />
		                        </span>
		                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"> Remove</i></a>
		                      </div>
						</div>
					  </div>
                 
			</div>
		    </div>

		    {{ Form::label('description','Description: ',['class' => 'form-spacing-top']) }}
		    {{ Form::textarea('description',null,['class' => 'form-control']) }}
			<div class="row">
				<div class="col-md-12">
					{{ Form::submit('Add Product',['class' => 'btn btn-sm btn-primary pull-right form-spacing-top']) }}
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>

	<script>
		$(document).ready(function(){
			$('.dynamic_one').change(function(){
				if($(this).val() != '')
				{
					var select = $(this).attr("id");
					var value = $(this).val();
					var dependent = $(this).data('dependent');
					var _token = $('input[name="_token"').val();

					$.ajax({
						url: "{{ route('products.fetch_category') }}",
						method: "POST",
						data : {select:select, value:value,_token:_token,dependent:dependent},
						success:function(result)
						{
							$('#'+dependent).html(result);
						}
					})
				}
			})

			$('.dynamic').change(function(){
				if($(this).val() != '')
				{
					var select = $(this).attr("id");
					var value = $(this).val();
					var dependent = $(this).data('dependent');
					var _token = $('input[name="_token"').val();

					$.ajax({
						url: "{{ route('products.fetch') }}",
						method: "POST",
						data : {select:select, value:value,_token:_token,dependent:dependent},
						success:function(result)
						{
							$('#'+dependent).html(result);
						}
					})
				}
			})
		})
	</script>
	
@endsection