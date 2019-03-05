@extends('admin.main')

@section('title','| edit product')

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
	<h1 class="text-center">EDIT {{ strtoupper($product->title) }}</h1>
	<img src="{{ asset('images/12.jpg') }}" width="100%">
	{!! Form::model($product,['route' => ['products.update',$product->id],'method' => 'PUT','files' => true]) !!}
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('title','Title:',['class' => ''.$errors->has('title') ? ' is-invalid form-spacing-top' : 'form-spacing-top']) }}
			{{ Form::text('title',null,['class' => 'form-control']) }}	
			
			    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
		</div>
		<div class="col-md-6">

			{{ Form::label('main_category','Category:',['class' => 'form-spacing-top']) }}
			{{ Form::select('main_category',$maincateg,null,['class' => 'form-control dynamic_one','name' => 'main_category','data-dependent'=> 'category']) }}
		
		</div>
	</div>

		<div class="row">

		<div class="col-md-3">

			{{ Form::label('category','Category:',['class' => 'form-spacing-top']) }}
			{{ Form::select('category',$categories,null,['class' => 'form-control dynamic','name' => 'category','data-dependent'=> 'brand']) }}
		
		</div>

		<div class="col-md-3">

			{{ Form::label('brand','Brand:',['class' => 'form-spacing-top']) }}
			{{ Form::select('brand',$subcategories,null,['class' => 'form-control','id' => 'brand']) }}
			
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
                        <img src="{{ asset('products/'.$product->image) }}" name="image" alt="" />
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
					{{ Form::submit('Finish !!',['class' => 'btn btn-sm btn-primary pull-right form-spacing-top']) }}
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