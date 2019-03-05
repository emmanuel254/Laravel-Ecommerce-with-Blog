
@extends('admin.main')

@section('title','| add product categories')

@section('content')
   <div class="main-content">
    <div class="row">
    	<h2 class="text-center">EDIT {{ $category->name }}</h2>
        {{ Form::model($category, ['route' => ['prodcategories.update',$category->id],'method' => 'PUT','files' => true]) }}
        <div class="col-md-3">
            {{ Form::label('name','Category Name:',['class' => 'form-spacing-top']) }}
            {{ Form::text('name',null,['class' => 'form-control']) }}
        </div>
            <div class="col-md-3">
             {{ Form::label('main_category', 'Main Category:',['class'=>'form-spacing-top']) }}
             <select class="form-control" name="main_category">
                <option value="{{ ($currentCateg->id) }}">{{ $currentCateg->name }}</option>
               @foreach($maincateg as $categories)

                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                @endforeach 
               
             </select>
        </div>
        <div class="col-md-6">
            {{ Form::label('description','Brief Description: ',['class' => 'form-spacing-top']) }}
            {{ Form::textarea('description',null,['class' => 'form-control','rows' => 3]) }}
        </div>
        <div class="col-md-12 form-spacing-top">
                    <div class="row">
                        <div class="col-md-3">
                             {{ Form::label('image_upload','Upload Image') }}
                        </div>

                         <div class="fileupload fileupload-new" data-provides="fileupload">

                        <div class="col-md-6">
                            <div class="fileupload-new thumbnail" style="width: 400px; height: 250px;">
                        <img src="{{ asset('products/categories/'.$category->image) }}" name="image" alt="" />
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
                     <div class="row">
                        <a href="{{ route('prodcategories.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                         {{ Form::submit('Edit Category',['class' => 'btn btn-sm btn-success pull-right']) }}
                     </div>
        </div>
        {{ Form::close() }}
    </div>

   </div>
    

@endsection






