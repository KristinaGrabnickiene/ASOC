@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
   
  
        
<div class="col-md-6">
    <div class="form-group  has-feedback">
        <div class='modal-title text-center form-title'><h5>Sveiki, {{ Auth::user()->username }} </h5> </div>
    </div>

    <div class="form-group has-feedback">
    

        <h1>Jums yra  {{$years}}  metų </h1> 
      
       <p>Todėl reikia užpildyti šiuos dokumentus: </p>

            @foreach($documents as $document)

           <a a href="{{route('document.show', $document->id) }}" > {{$document->name}} </a> <br> 



        @endforeach
    </div>
</div>
<br>



@endsection