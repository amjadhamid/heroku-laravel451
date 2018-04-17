@extends('layout.app')
@section('content')
    
 <div class="container">
            <div class="content">

                <div class="title m-b-md">
                   <h1>posts</h1>
               @if (count($posts) > 0 )
                   
               
               @foreach ($posts as $post)
                     <div class="col-sm-12 col-md-12 col-lg-6">          
                         <div class="panel panel-primary">
                           <div class="panel-heading"><h2>{{$post->firstname}}-{{$post->lastname}}</h2></div>

                           <div class="panel-body">
                          
                           {{$post->subject}}
                           <span class="label label-danger">created_at:{{$post->created_at}}</span>
                           <a class='pull-right' href="/posts/{{$post->id}}" class="btn btn-primary" role="button">More</a>
                           </div>
                         </div>
                     </div>
               @endforeach
            {{$posts->links()}}
                
               @else

                  <div class="alert alert-warning" role="alert">No Posts</div>
  
            
               @endif



                </div>
            </div>
 </div>

 @endsection