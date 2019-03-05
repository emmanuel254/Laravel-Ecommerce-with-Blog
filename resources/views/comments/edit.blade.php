@extends('admin.main')

@section('title','| Edit Title')

@section('content')

	<div class="main-content row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1 class="text-center">Edit comment</h1>
			{{ Form::model($comment,['route' => ['comments.update',$comment->id], 'method' => 'PUT']) }}

				{{ Form::label('name','Name:') }}
				{{ Form::text('name',null,['class' => 'form-control','disabled' => '']) }}

				{{ Form::label('email','Email:') }}
				{{ Form::text('email',null,['class' => 'form-control','disabled' => '']) }}

				{{ Form::label('comment', 'Comment:') }}
				{{ Form::textarea('comment',null,['class'=> 'form-control']) }}

				{{ Form::submit('update Comment',['class' => 'btn btn-sm btn-success btn-h1-spacing']) }}
			{{ Form::close() }}
		</div>
		<div class="col-md-2"></div>
	</div>
	

@endsection