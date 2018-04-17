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
                          <a class='pull-right' href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">Edit</a>


                        </div>
                          <div class="panel-body">
                          
                            {!! Form::open(['action' => ['PostController@update', $post->id] , 'method'=>'POST']) !!}

                            {{Form::hidden('_method' , 'DELETE')}}

                            {{Form::submit('Delete' ,['class' => 'pull-right btn btn-danger btn-lg' , ])}}

                            {!! Form::close() !!} 



                           {{$post->subject}}
                           {!!$post->body!!}

                           <span class="label label-danger">created_at:{{$post->created_at}}</span>
                         <a class='pull-right' href="/posts" class="btn btn-primary" role="button">Back</a>

                           </div>
                         </div>
                     </div>
            



                </div>
            </div>
 </div>

 @endsection