@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

@guest
@else
 @if(Auth::user()->role == "1")
 <a href="{{ route('profile.create') }}"><button  type="button" class="btn btn-dark btn-lg"> 
Pridėti profilį</button>
</a> 
@endif
@endguest 
<p class="text-par"><h1> Asosiacijos nariai </h1></p>
        <div class=row>
        <div class="col-md-6">
        <p class="text-name">Filtras : <a href="?expirationDate=2019-02-01" > Aktyvūs nariai  </a>| 
        <a href="?expirationDate=1770-07-07" > Neaktyvūs nariai  </a>|                
            <a href="?" > Visi </a></p>    
        </div>
        <div class="col-md-4">
        <p class="text-name"> Rikiuoti pagal pavardę :
            <a href="?sort=asc" > A -> Ž | </a>
            <a href="?sort=desc" > Ž -> A  | </a></p>
        </div>
        </div>
        <table class="table table-striped">
        <th scope="col"> <h3> Vardas </h3></th>
        <th scope="col"> <h3>Pavardė </h3> </th> 
        <th scope="col"> <h3>Gimimo data</h3> </th> 
        <th scope="col"> <h3>Telefonas</h3></th> 
        <th scope="col"> <h3>Adresas</h3></th> 
        <th scope="col"> <h3>Narystė iki </h3> </th> 
        <th scope="col"> <h3> </h3> </th> 
        <th scope="col"> <h3></h3> </th> 
        <!-- Einame per visą duomenų bazę -->
        @foreach($profile as $person)

        <tr scope="row">
            <td>{{$person->name}}</td>
            <td>{{$person->surname}}</td>
            <td>{{$person->birthday}}</td>
            <td>{{$person->phone}}</td>
            <td>{{$person->address}}</td>
            
            @if ($person->expirationDate == "1770-07-07") 
            <td> Neaktyvi </td>
            @else
             <td> {{$person->expirationDate}} </td>
            @endif
                
                

        <td><a href="{{route('profile.edit', $person->id)}}"> <button  type="button" class="btn btn-green">Taisyti  </button></a></td>
         
        <td>
        <form action="{{ route('profile.delete', $person->id) }}" class='delete-form' method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style= "width:150px;" class="btn btn-danger"> Ištrinti </button>
                    </form>
        </td> 
        
        @endforeach
        </table>

        <script>
        $('.delete-form').submit(function() {
            
            return confirm('Ar tikrai norite ištrinti');
        });
        </script>
              


@endsection