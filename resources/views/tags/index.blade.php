@extends('admin.main')

@section('title', '| All Tags')

@section('content')
<link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.css" />
	
	<div class="main-content row">
		<div class="col-md-8">
			<h1 class="text-center">Tags</h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($tags as $tag)

					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
						<td>
						<a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-sm btn-info pull"><i class="fa fa-edit"></i> edit</a>
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<div class="well" style="margin-top: 35px;"> 
			{!! Form::open(['route' => 'tags.store']) !!}
				<h2 class="text-center btn-h1-spacing">New Tag</h2>
				{{ Form::label('name','Name:') }}
				{{ Form::text('name',null,['class' => $errors->has('name') ? ' is-invalid form-control' : 'form-control','required']) }}

				@if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

				{{ Form::submit('create',['class' => 'btn btn-xs btn-primary btn-block btn-h1-spacing']) }}
			{!! Form::close() !!}
		   </div>
		</div>
	</div>


@endsection