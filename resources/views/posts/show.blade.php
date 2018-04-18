@extends('layout.app')
@section('content')
    
 <div class="container">
            <div class="content">

                <div class="title m-b-md">
                   <h1>post -<a class='pull-right' href="/posts" class="btn btn-primary" role="button">Back</a>

                   
                   </h1>
         
                     <div class="col-sm-6 col-md-6 col-lg-3">          
                         <div class="panel panel-danger container">
                           <div class="panel-heading">{{$post->firstname}}-{{$post->lastname}}
                        </div>
                       // for security
                       @if (!Auth::guest())
                       @if (!Auth::user()->id == $post->user_id)
                    
                          <a class='pull-right' href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">Edit</a>


                       
                          <div class="panel-body">
                          
                            {!! Form::open(['action' => ['PostController@update', $post->id] , 'method'=>'POST']) !!}

                            {{Form::hidden('_method' , 'DELETE')}}

                            {{Form::submit('Delete' ,['class' => 'pull-right btn btn-danger btn-lg' , ])}}

                            {!! Form::close() !!} 

                       @endif
                       @endif

                           {{$post->subject}}
                           {!!$post->body!!}
                          <img src="/storage/post_image/{{$post->post_image}}" alt="$post->post_image" class="img-thumbnail">

                           <span class="label label-info">created_at:{{$post->created_at}} by {{$post->user->name}}</span>
                         <a class='pull-right' href="/posts" class="btn btn-primary" role="button">Back</a>

                           </div>
                         </div>
                     </div>
            



                </div>
            </div>
 </div>

 @endsection