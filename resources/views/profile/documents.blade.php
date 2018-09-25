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
    

        <h1>{{$profile->name}} yra  {{$years}}  </h1> 
        <h5> Dabar: {{$now}} </h5>
       
            @foreach($documents as $document)

            @if (( $document->create_date <= $now ) &&  ( $document->valid_till  > $now ) &&  ($document->age_from <= $years) && ($document->age_till > $years) ) 

                 <p> Jam {{$years}} , mokėti {{ $document-> price}} $, nes {{ $document-> name }} ir {{ $document-> id}} 
            @else 
            @endif

        @endforeach
    </div>
</div>
<br>



@endsection