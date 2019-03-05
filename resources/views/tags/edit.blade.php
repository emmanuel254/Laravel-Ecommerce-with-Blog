@extends('admin.main')

@section('title'," Edit Tag")

@section('content')
	<div class="main-content" >
	{{ Form::model($tag, ['route' => ['tags.update',$tag->id], 'method' => 'PUT']) }}
	    <div class="row">
	    	<div class="col-md-3">
	    		{{ Form::label('name','Title: ',['class' => 'text-center btn-h1-spacing']) }}
	    	</div>
	    	<div class="col-md-6">
	    		{{ Form::text('name',null,['class' => 'form-control btn-h1-spacing']) }}
	    	</div>
	    	<div class="col-md-3">
	    		<div class="btn-group" role="group" aria-label="Basic example">
				  <a href="{{ route('tags.show',$tag->id) }}" class="btn btn-warning btn-sm btn-h1-spacing">Cancel</a>
				  {{ Form::submit('Save Changes',['class' => 'btn btn-success btn-sm btn-h1-spacing']) }}
				</div>
	    	</div>
	    </div>
		
	{{ Form::close() }}
  </div>

@endsection