@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif


<p class="text-par"><h1> Visi užsiregistrave svetainės vartotojai: </h1></p>
           
        <div class="col-md-4">
        <p class="text-name"> Rikiuoti pagal pavardę :
            <a href="?sort=asc" > A -> Ž | </a>
            <a href="?sort=desc" > Ž -> A  | </a></p>
        </div>
        

        <table class="table table-striped">
            <th scope="col"> <h3>Slapyvardis </h3></th>
            <th scope="col"> <h3>El. paštas </h3> </th> 
            <th scope="col"> <h3>Pareigos </h3> </th> 
            <th scope="col"> <h3>Ban'as </h3> </th> 
            <th scope="col"> <h3>Sukurta </h3></th> 
             <th></th>
             <th></th>
        
            @foreach($users as $user)
            <tr scope="row">
                @if($user->role == "1") 
                @else
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                    @if ($user->role == "2") 
                    <td> administratorius </td>
                    @elseif ($user->role == "3")
                    <td> vartotojas </td>
                    @endif
                @if($user->suspend == "0" )
                <td>Aktyvus</td>
                @else
                <td>Užbanintas</td>
                @endif 
                    <td>{{$user->created_at}}</td>
                <td><a href=""> <button  type="button" class="btn btn-green">Taisyti  </button></a></td>
                <td><button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete">Suspenduoti</button></td> 
                </tr>
                @endif
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
                    <form action="" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" style= "width:150px;" class="btn btn-danger"> Suspenduoti </button>
                    </form>
                        </div>
                    <div>
                </div>
            </div>
            </div>
        </div>
        </div>

@endsection