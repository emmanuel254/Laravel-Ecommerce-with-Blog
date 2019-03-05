  @extends('main')

  @section('title', '| Contact')

  @section('content')
<br>

    <div class="row">
        <h1 class="text-center">Questions Zone!!</h1>
    </div>
    
    <div class="w3l_banner_nav_right">
            <div class="w3l_banner_nav_right_banner6">
                <h3>Does this really help in my health??</h3>
            </div>
            <div class="clearfix"></div>
    </div>
    
    <div class="row">
        <h2 class="text-center">About the Page</h2>
        <p>
            This page is created specifically for you to be able to ask any question to the public regarding
            <li>Health issues and complications</li>
            <li>Recipes of particular types of food</li>
            <li>Good Clothes for you to weare</li>
            <li>And many other questions even regarding a particular text in the bible</li>
        </p>
        <p>
            Once you send a message, you can be able to manage it in <a href="#" class="text-danger">My Posts</a> Page and also view the answers to your question
        </p>
    </div>

            {!! Form::open(['route' => 'posts.store','data-parsley-validate' => '','files' => true]) !!}
          
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('Username', 'Username:',['class' => 'form-spacing-top'])}}
              {{ Form::text('username', null,array('class' => 'form-control', 'required' => '','minlength'=>'3',
                  'maxlength' => '255')) }}
            </div>

            <div class="col-md-6">
              {{ Form::label('title', 'Title:',['class' => 'form-spacing-top']) }}
              {{ Form::text('title', null,array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}
            </div>
            
          </div>
          <div class="row">

            <div class="col-md-6">
              {{ Form::label('category_id','Category:',['class' => 'form-spacing-top']) }}
             <select class="form-control select2-states js-states" name="category_id">

               @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach 
               
             </select>
            </div>

            <div class="col-md-6">
              {{ Form::label('tags','Tag:',['class' => 'form-spacing-top']) }}
             <select class="form-control select2-multi" name="tags[]" multiple="multiple">

               @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach 
               
             </select>
            </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                 
                  {{ Form::label('featured_image','Upload Image',['class' => 'form-spacing-top']) }}
                  {{ Form::file('featured_image',['class' =>'form-control']) }}
         
              </div>
              <div class="col-md-6">
                   {{ Form::label('body', 'Question:',['class' => 'form-spacing-top'])}}
                   {{ Form::textarea('body', null,array('class' => 'form-control', 'rows' => '5','required' => '','placeholder'=>'Your Question Here'))}}
              </div>
          </div>

          <div class="row">
              <div class="col-md-6">
                  
              </div>
              <div class="col-md-6">

            {{ Form::submit('Send Question ?', array('class' => 'btn btn-primary btn-block' ,'style' => 'margin-top:20px;'))}}
                
              </div>
          </div>

        {!! Form::close() !!}
    </div>

  @endsection
 
