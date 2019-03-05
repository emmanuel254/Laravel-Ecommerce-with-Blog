@extends('admin.main')

@section('title', '| All Categories')

@section('content')

<div class="main-content row">
		<div class="col-md-8">
			<h1 class="text-center">Editing Categories</h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($categories as $category)

					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
						<td>
						{!! Form::open(['route' => ['categories.destroy',$category->id],'method' => 'DELETE']) !!}
						<input type="submit" class="btn btn-sm btn-danger pull" value="delete">
						{!! Form::close() !!}
						
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
					<div class="well" style="margin-top: 35px;"> 
					{!! Form::model($categorydata,['route' => ['categories.update',$categorydata->id],'method' => 'PUT']) !!}
						<h2 class="text-center btn-h1-spacing">Edit Category</h2>
						{{ Form::label('name','Name:') }}
						{{ Form::text('name',null,['class' => $errors->has('name') ? 'is-invalid form-control' : 'form-control','required']) }}

						@if ($errors->has('name'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('name') }}</strong>
		                    </span>
		                @endif

		                <div class="row">
		                	<div class="col-md-6">
		                		<a href="{{ route('categories.index') }}" class="btn btn-xs btn-default btn-block btn-h1-spacing">Cancel</a>
		                	</div>
		                	<div class="col-md-6">
		                		{{ Form::submit('Update',['class' => 'btn btn-xs btn-info btn-block btn-h1-spacing']) }}
		                	</div>
		                </div>

					{!! Form::close() !!}
				   </div>
		</div>
	</div>

@endsection