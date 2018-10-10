@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
@if($result == 1)


                <h1>{{$document->name}}</h1>
                <br>
                <p>{{$document->text}}</p>
                <p>Stojimo mokestis : {{$document->price}} EUR </p>


                 
                <!-- Default unchecked -->
             
 <form class="was-validated" method="post" action= "{{route( 'document.accept', ['document' => $document->id, 'profile' => $profile->id, 'accept'=> 1])}}" >
 <input type="hidden" name ="documentID" 
        value="{{ ($document) ? $document['id']: '' }}">
<input type="hidden" name ="ProfileID" 
        value="{{ ($profile) ? $profile['id']: '' }}">
        {{ csrf_field()}}
  <div class="custom-control custom-checkbox mb-3">
  <label class="custom-control-label" > Su dokumentu susipažinau, atsisiųsti jį pasirašyti</label>
<br>
    <input type="checkbox" class="custom-control-input" id="accept" required>
    <label class="custom-control-label"><h1>Sutinku</h1></label>
   
    

    
    <div class="form-group has-feedback">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-green btn-block btn-flat">
                    Išsaugoti
                </button>
            </div>
        </div>
  </div>
@else
                <h3> Toks dokumentas jau pasirašytas </h3>
                <br>
                <br>
                <button  type="button" class="btn btn-green" onclick="goBack()">Grįžti atgal</button>
@endif
      
                   
@endsection 
            

             