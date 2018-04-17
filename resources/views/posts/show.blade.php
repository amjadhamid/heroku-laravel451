@extends('layout.app')
@section('content')
    
 <div class="container">
            <div class="content">

                <div class="title m-b-md">
                   <h1>post -<a class='pull-right' href="/posts" class="btn btn-primary" role="button">Back</a>

                   
                   </h1>
         
                     <div class="col-sm-6 col-md-6 col-lg-3">          
                         <div class="panel panel-danger container">
                           <div class="panel-heading"><h2>{{$post->firstname}}-{{$post->lastname}}</h2></div>
                           <div class="panel-body">
                          
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