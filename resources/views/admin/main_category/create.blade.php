

@extends('admin.main')

@section('title','| add product categories')

@section('content')
   <div class="main-content">
    <div class="row">
    	<h2 class="text-center">ADD MAIN CATEGORY</h2>
        {{ Form::open(['route' => 'main_categories.store','files' => true]) }}
        <div class="col-md-6">
            {{ Form::label('name','Category Name:',['class' => 'form-spacing-top']) }}
            {{ Form::text('name',null,['class' => 'form-control']) }}
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
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" name="image" alt="" />
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
                        <a href="{{ route('main_categories.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                         {{ Form::submit('Save Category',['class' => 'btn btn-sm btn-success pull-right']) }}
                     </div>
        </div>
        {{ Form::close() }}
    </div>

   </div>
    

@endsection






