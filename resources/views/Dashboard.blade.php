@extends('layouts.app')

    <link href="https://bootswatch.com/4/lux/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>;



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <a class="btn btn-primary btn-lg" href="/posts/create">Create new Post!</a>
                    @foreach ($posts as $post)
                         <div class="panel panel-success">
                           <div class="panel-heading"><h2>{{$post->firstname}}-{{$post->lastname}}</h2></div>

                           <div class="panel-body">
                          
                           {{$post->body}}
                           <span class="label label-danger">created_at:{{$post->created_at}}</span>
                           <a class='pull-right' href="/posts/{{$post->id}}" class="btn btn-primary" role="button">More</a>
                       
                        <div class="panal-footer">
                          <a class='pull-right' href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">Edit</a>

                             {!! Form::open(['action' => ['PostController@update', $post->id] , 'method'=>'POST']) !!}

                            {{Form::hidden('_method' , 'DELETE')}}

                            {{Form::submit('Delete' ,['class' => 'pull-right btn btn-danger btn-lg' , ])}}

                            {!! Form::close() !!} 



                            </div>
                           </div>
                         </div>
                         
                       @endforeach
              
              
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
