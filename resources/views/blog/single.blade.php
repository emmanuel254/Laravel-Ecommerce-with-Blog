@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title',"| $titleTag")

@section('content')
	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div style="margin-top: 20px">
			<?php if($post->image != ''):?>
			<img class="images" src="{{ asset('images/'.$post->image) }}">
			<?php endif; ?>
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		  </div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3 class="comments-title">{{ $post->comments()->count() }} Comments <i class="fa fa-comments-o"></i></h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=robohash" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F nS, Y @ g:iA', strtotime($comment->created_at)) }}</p>
						   
						</div>
						
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div id="comment-form" class="col-md-8 btn-h1-spacing">
			{{ Form::open(['route' => ['comments.store',$post->id],'method' => 'POST']) }}

				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null,['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email','Email:') }}
						{{ Form::text('email',null,['class' => 'form-control']) }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{ Form::label('comment','Comment:') }}
						{{ Form::textarea('comment',null,['class' => 'form-control','rows' => '5']) }}

						{{ Form::submit('Comment',['class' => 'btn btn-success btn-sm btn-h1-spacing']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-2"></div>
	</div>

@endsection