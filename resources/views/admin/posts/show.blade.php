@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
    	<div class="col-md-8">
            <img src="{{ asset('images/'.$post->image) }}" width="90%" height="60%">

    		<h1>{{ $post->title }}</h1>

	        <p class="lead">{!! $post->body!!}</p>

            <hr>

                @foreach($post->tags as $tag)
              <div class="badge badge-primary badge-pill">
                 
                    <span class="label label-default">{{ $tag->name }}</span> 
              </div>
              @endforeach
              <div id="backend-comments" style="margin-top: 50px">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th width="200px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
    	</div>
        
    	<div class="col-md-4">
            <div class="card border-dark mb-3" style="max-width: 18rem;">
              <div class="card-header">DETAILS</div>
              <div class="card-body text-secondary">
                <dl class="dl-horizontal">
                    <dt>Url:</dt>
                    <dd>
                        <i>
                        <a href="{{ route('blog.single',$post->slug) }}"> {{ route('blog.single',$post->slug) }}</a>   
                        </i>
                    </dd>
                </dl>

                <dl class="dl-horizontal">
                    <i><b>Category: </b>{{ $post->category->name }}</i>
                </dl>

                <dl class="dl-horizontal">
                     <i><b>Created at: </b>{{ date('M j, y h:i a',strtotime($post->created_at)) }}</i>
                </dl>
                
                <dl class="dl-horizontal">
                     <i><b>Updated: </b>{{ date('M j, y h:i a',strtotime($post->updated_at)) }}</i>
                </dl>

                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), 
                            array('class' => 'btn btn-primary btn-block btn-sm')) !!}
                    </div>
                    <div class="col-sm-6">

                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-sm']) !!}

                    {!! Form::close() !!}   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', '<< See all posts', [] ,['class' => 'btn btn-info btn-block btn-sm btn-h1-spacing']) }}
                    </div>
                </div>
              </div>
            </div>
    		
    	</div>
    </div>

@endsection