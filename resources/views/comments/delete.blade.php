@extends('admin.main');

@section('title','| DELETE COMMENT')

@section('content')


	<div class="main-content row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1 class="text-center">DELETE THIS COMMENT</h1>
			<p>
				<strong>Name: </strong>{{ $comment->name }}<br>
				<strong>Email: </strong>{{ $comment->email }}<br>
				<strong>Comment: </strong>{{ $comment->comment }}
			</p>
			{{ Form::open(['route' => ['comments.destroy',$comment->id], 'method' => 'DELETE']) }}
				{{ Form::submit('YES DELETE THIS COMMENT',['class' => 'btn btn-danger','style' => 'margin-right:0%;']) }}
			{{ Form::close() }}

		</div>
		<div class="col-md-2"></div>
	</div>

@endsection