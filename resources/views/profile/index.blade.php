@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
@guest
@else
 <!-- @if(Auth::user()->role == "admin") -->
 <a href=""><button  type="button" class="btn btn-dark btn-lg"> 
                
                 Įstoti į asociaciją mašinos įrašą </button>
				</a> 
<!-- @endif -->
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
        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete">ištrinti </button>
        </td> 
        
        @endforeach
        </table>
              


         <div class="modal fade" id="delete" role="dialog">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="text-center form-title">Ar tikrai norite ištrinti nario anketą?</h4>
                </div>
                
                <div class="modal-body">
                    <div class = "row">
                        <div class= "col-md-6">
                    <button type="button" style= "width:150px;" class="btn btn-green" data-dismiss="modal">Atšaukti</button>
                        </div>
                        <div class= "col-md=6">
                    <form action="{{ route('profile.delete', $person->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style= "width:150px;" class="btn btn-danger"> Taip </button>
                    </form>
                        </div>
                    <div>
                </div>
            </div>
            </div>
        </div>
        </div>

@endsection