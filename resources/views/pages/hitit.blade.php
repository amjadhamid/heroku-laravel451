@extends('layout.app')

@section('content')
    

  <div class="content">
                <div class="title m-b-md">
                   hitit
               </div>
            </div>

  <div class="content">
                <div class="title m-b-md">
                  <ul>
                  @foreach ($desc as $item)
                     <li> {{$item}}</li>
                  @endforeach 
                  </ul>
               </div>
            </div>
    @endsection