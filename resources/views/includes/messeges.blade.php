@if(count($errors)>0)
  @foreach($errors->all() as $error)
  
  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh  !</strong> {{$error}}  and try submitting again.
</div>
  
  
  
  @endforeach

  @endif

  @if(session('success'))
  
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong>   {{session('success')}}.
</div>
  


  @endif


   @if(session('error'))
  
  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh  !</strong>   {{session('error')}}  and try submitting again.
</div>


   

  @endif