@extends('layout.app')


@section('content')
    {{-- like normal form --}}
<div class='container'>
<div class="card">
  <div class="card-header">
    <h1> Create Post</h1>
  </div>
  <div class="card-body">

{!! Form::open(['action' => 'PostController@store' , 'method'=>'POST']) !!}
    
    
    <div class="form-group">
    {{Form::label('subject', 'Subject')}}
    {{Form::text('subject' , '' , ['class' => 'form-control' , 'placeholder'=> 'Subject'])}}
    </div>

    <div class="form-group">
    {{Form::label('firstname', 'First Name')}}
    {{Form::text('firstname' , '' , ['class' => 'form-control' , 'placeholder'=> 'First Nmae'])}}
    </div>

    <div class="form-group">
    {{Form::label('lastname', 'Last Name')}}
    {{Form::text('lastname' , '' , ['class' => 'form-control' , 'placeholder'=> 'Last Nmae'])}}
    </div>

    <div class="form-group">
    {{Form::label('body', 'Discriptions')}}
    {{Form::textarea('body' , '' , ['class' => 'form-control' , 'placeholder'=> 'Discriptions ' , 'id'=>'article-ckeditor' ])}}
    </div>

    {{Form::submit('Add Post' ,['class' => 'btn btn-primary btn-lg' , ])}}

{!! Form::close() !!} 

 </div>
</div>
</div>



@endsection





