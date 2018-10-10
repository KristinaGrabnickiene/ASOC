@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
   
  
        
<div class="col-md-12">
    <div class="form-group  has-feedback">
        <div class='modal-title text-center form-title'><h5>Sveiki, {{ Auth::user()->username }} </h5> </div>
    </div>

    <div class="form-group has-feedback">
    

        <h1>Jums yra  {{$years}}  metų </h1> 
      
       <p>Todėl reikia užpildyti šiuos dokumentus: </p>

        <table class="table table-striped" >
        <th scope="col"> Nr. </th>
        <th scope="col"> Visi dokumentai</th>
        <th scope="col"> Pasirašyti dokumentai</th>
        <th scope="col"> Sumokėti </th>
            <tr scope="row">
           
                @foreach($documents as $document)
               
                <td> Nr. {{$document->id}}  </td>
                <td> <a href="{{route('document.show', ['document' => $document->id, 'profile' => $profile->id] ) }}" > {{$document->name}} </a></td>
                
                
                @foreach($profileDocument as $singed)
                @if(($singed->document_id) == $document->id)
                <td>pasirašyta</td> <td> {{$singed->document->price}} </td>
                @endif
                
                @endforeach
                
                </tr>
                @endforeach
              

        </table> 

    </div>
    <div class="form-group has-feedback"> 
        
        



@endsection