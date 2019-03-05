  

@extends('main')

@section('title', '| Homepage')

@section('content')

<h2 class="text-center text-primary">Welcome! You can give your review here</h2>
     <div class="row">
         <div class="col-md-12">
             <div class="jumbotron">
                 <h1>Welcome to healthy living blog</h1>
                <p class="lead" >Thank you for visiting this site build with laravel. Please read my latest comments.</p>
                <p><a href="" class="btn btn-md btn-primary" role="button">Popular post</a></p>
          
             </div>
         </div>
     </div><!-- end of row -->
     <div class="row">
         <div class="col-md-8">

         @foreach($posts as $post)
             <div class="">

                <?php if($post->image != ''): ?>
                    <img src="{{ asset('images/'.$post->image) }}" style="width: 90%;" class="index-images">
                <?php endif;?>
                 <a href="{{ url('blog/'.$post->slug) }}"><h3 style="margin-top: 25px;">{{ $post->title}}</h3></a>

                 <p>{{ $post->category->name }} | {{$post->comments()->count() }} comments</p>
                 <p class="post">{{ substr(strip_tags($post->body), 0,300) }}{{ strlen(strip_tags($post->body)) > 50 ? " ..." : ""}}
                 <a href="{{ url('blog/'.$post->slug) }}" class="continue-reading-btn" style="font-size: 15px"><i>Continue reading</i> <i class="fa fa-long-arrow-right m-l-8"></i></a>
               </p>
               <p><i class="fa fa-heart-o" style="margin-right: 6px;"> 243</i>
                  <i class="fa fa-comment-o" style="margin-right: 6px;"> 5 comments</i>
                  <i class="fa fa-thumbs-o-down"> 1</i>
                  <span class="pull-right" style="margin-bottom: 22px;"><small><i>{{ date('M j, Y',strtotime($post->created_at)) }} at {{ date('H : i a', strtotime($post->created_at)) }}</i></small></span>
               </p>
             </div>
            <hr>
        @endforeach

         </div>
         <div class="col-md-1"></div>
         <div class="col-md-3 col-md-offset-1">
             <h1>Tags</h1>

             @foreach($tags as $tag)
                <div class="badge badge-primary badge-pill">
                    <span class="label label-default">{{ $tag->name }}</span> 
              </div>
             @endforeach

         </div>
     </div><!-- end of row -->

@endsection
