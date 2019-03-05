@extends('admin.main')

@section('title','| add category')

@section('content')    

 <div class="main-content">
 	     
 <h2 class="text-center">MAIN CATEGORIES</h2>

 	<a href="{{ route('main_categories.create') }}" class="btn btn-primary pull-right">create new category</a>

 	<div class="row">
 	
 		<div class="col-md-10">
 			<table class="table table-striped table-condensed">
 				<thead>
 					<th>#</th>
 					<th>Name</th>
 					<th class="text-center">Description</th>
 					<th style="width: 200px;">Action</th>
 				</thead>
 				<tbody>

 					@foreach($maincateg as $maincategory)

 					<tr>

 						<td>1</td>
 						<td>{{ $maincategory->name }}</td>
 						<td>{{ $maincategory->description }}</td>
 						<td>
 							<div class="btn-group" role="group">
                                   <a href="{{ route('main_categories.show',$maincategory->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye"> View</i></a>
                                <a href="{{ route('main_categories.edit',$maincategory->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"> Edit</i></a> 
                                </div>

 						</td>
						
 					</tr>

 					@endforeach

 				</tbody>
 			</table>
 		</div>
 		
 	</div>
 	
 </div>
 
  
@endsection

