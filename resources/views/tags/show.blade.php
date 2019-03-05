@extends('admin.main')

@section('title', "| $tag->name Tag")

@section('content')
    <div class="main-content ">
	<div class="row">
		<div class="col-md-6"><h1>{{ $tag->name }} Tag</h1></div>
		<div class="col-md-2">  <h3>Posts<span class="badge badge-info btn-h1-spacing">{{ $tag->posts()->count() }}</span></h3></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-6">
					<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-primary pull-right btn-block" style="margin-top: 20px;">Edit</a>
				</div>
				<div class="col-md-6">
					{{ Form::open(['route' => ['tags.destroy',$tag->id], 'method' => 'DELETE']) }}
						{{ Form::submit('Delete',['class' => 'btn btn-danger btn-sm btn-h1-spacing btn-block']) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($tag->posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td> {{ $post->title }} </td>
						<td>
							@foreach($post->tags as $tag)
								<span class="badge badge-default">
									{{ $tag->name }}
								</span>
							@endforeach
						</td>
						<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm">View <i class="fa fa-eye"></i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>


@endsection