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

        <table>
            <tr>
           
                @foreach($documents as $document)
               
                <td> Nr. {{$document->id}}  </td>
                <td> <a href="{{route('document.show', ['document' => $document->id, 'profile' => $profile->id] ) }}" > {{$document->name}} </a></td>
            </tr>
       
        @endforeach

        </table> 

    </div>
    <div class="form-group has-feedback"> 
        
        <h5>Pasirašyti dokumantai: </h5>
    
        <p> @foreach($singed as $sing) 
        @if ($sing->profile_id == $profile->id ) 
        <h5>Nr.{{$sing->accept}}   {{$sing->name}} Pasirašytas  </h5> </p> <p>Sumokėti {{$sing->price}} </P>
        @endif
        @endforeach 
        
    </div>
</div>
<br>



@endsection