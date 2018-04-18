@extends('layout.app')


@section('content')
    {{-- like normal form --}}
<div class='container'>
<div class="card">
  <div class="card-header">
    <h1> Edit Post</h1>
  </div>
  <div class="card-body">

{!! Form::open(['action' => ['PostController@update', $post->id] , 'method'=>'POST' ,'enctype'=>'multipart/form-data']) !!}
    
    
    <div class="form-group">
    {{Form::label('subject', 'Subject')}}
    {{Form::text('subject' , $post->subject , ['class' => 'form-control' , 'placeholder'=> 'Subject'])}}
    </div>

    <div class="form-group">
    {{Form::label('firstname', 'First Name')}}
    {{Form::text('firstname' , $post->firstname , ['class' => 'form-control' , 'placeholder'=> 'First Nmae'])}}
    </div>

    <div class="form-group">
    {{Form::label('lastname', 'Last Name')}}
    {{Form::text('lastname' , $post->lastname , ['class' => 'form-control' , 'placeholder'=> 'Last Nmae'])}}
    </div>

    <div class="form-group">
    {{Form::label('body', 'Discriptions')}}
    {{Form::textarea('body' , $post->body , ['class' => 'form-control' , 'placeholder'=> 'Discriptions ' , 'id'=>'article-ckeditor' ])}}
    </div>

<div class="form-group">
    {{Form::file('post_image' , '' , ['class' => 'form-control' ])}}
    </div>

    {{Form::hidden('_method' , 'PUT')}}

    {{Form::submit('Update' ,['class' => 'btn btn-primary btn-lg' , ])}}

{!! Form::close() !!} 

 </div>
</div>
</div>



@endsection





